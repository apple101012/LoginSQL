<?php
session_start();
?>
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
        <div class="mid">This project is a demonstration of a login and signup system utilizing css, html, php, and SQL.
            <?php
            if (isset($_SESSION["useruid"])) {
                echo "<br></br><span style=color:green> Welcome " . $_SESSION["useruid"] . ".</span>";
            }
            ?>

        </div>
    </div>
</body>

</html>