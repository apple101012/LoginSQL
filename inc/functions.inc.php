<?php
//TRUE IS BAD FOR THESE FUNCTIONS
function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) // checks empty sign up
{
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        $results = true;
    } else {
        $results = false;
    }
    return $results;
}

function invalidUid($username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { //checks to make sure username is a-z and 0-9
        $results = true;
    } else {
        $results = false;
    }
    return $results;
}
function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //this is function to check that the text is a email
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdrepeat)
{
    if ($pwd !== $pwdrepeat) { //simple check the passwords to see if they match
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;"; //question mark
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) { //checks to see if the statement is valid
        header("location: ../login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email); //replaces the question mark in encrypted way
    mysqli_stmt_execute($stmt);  //now stmt has the data

    $resultData = mysqli_stmt_get_result($stmt); //get result
    if ($row = mysqli_fetch_assoc($resultData)) { //makes the result into array row['usersId']
        return $row; //for the signup if it has data is returns error but this normally returns array
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt); //always close connection
}

function createUser($conn, $name, $email, $username, $pwd)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES(?, ?, ?, ?);"; //question marks again
    $stmt = mysqli_stmt_init($conn); //start the connection
    if (!mysqli_stmt_prepare($stmt, $sql)) { //test the sql works
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //one-way hash magic
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd); //replaces each questionmark
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}
function emptyInputLogin($username, $password) //check if username blank
{
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd) //this logins the user
{
    $uidExists = uidExists($conn, $username, $username); //checks if the person exists
    if ($uidExists === false) {
        header("location: ../login.php?error=usernotfound");
        exit();
    }
    $pwdHased = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHased); //checks the password
    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    } else if ($checkPwd === true) { //creates a session
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}
