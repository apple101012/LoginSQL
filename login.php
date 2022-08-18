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
            <h1>Log In</h1>
            <form action="inc/login.inc.php" method="post">
                <input type="text" name="name" placeholder="Username/Email...">
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="submit">Log in</button>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo '<div class="error" style = "color:red;">Fill in all the fields</div>';
                } else if ($_GET['error'] == "usernotfound") {
                    echo '<div class="error" style = "color:red;">Invalid username</div>';
                } else if ($_GET['error'] == "wrongpassword") {
                    echo '<div class="error" style = "color:red;">Incorrect Password/div>';
                }
            }

            ?>
        </div>
    </div>
</body>

</html>