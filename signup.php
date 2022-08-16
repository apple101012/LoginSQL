<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    include_once 'header.php';
    ?>
    <div class="wrap">
        <div class="signupform mid">
            <h1>Sign Up</h1>
            <form action="inc/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="email" placeholder="Email...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat password...">
                <button type="submit" name="submit">Sign up</button>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo '<div class="error" style = "color:red;">Fill in all the fields</div>';
                } else if ($_GET['error'] == "invaliduid") {
                    echo '<div class="error" style = "color:red;">Invalid username</div>';
                } else if ($_GET['error'] == "invalidemail") {
                    echo '<div class="error" style = "color:red;">Invalid email</div>';
                } else if ($_GET['error'] == "pwdunmatch") {
                    echo '<div class="error" style = "color:red;">Passwords do not match</div>';
                } else if ($_GET['error'] == "usernametaken") {
                    echo '<div class="error" style = "color:red;">Username already taken</div>';
                } else if ($_GET['error'] == "none") {
                    echo '<div class="error" style = "color:green;">Log in successful</div>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>