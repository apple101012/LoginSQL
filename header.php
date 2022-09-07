<?php
session_start();
?>
<nav>
    <div class="main">Blogs</div>
    <ul>

        <li><a href="index.php">Home</a></li>
        <?php
        if (isset($_SESSION["useruid"])) {
            echo '<li><a href="">' . $_SESSION["useruid"] . '</a></li>';
            echo '<li><a href="inc/logout.inc.php">Log out</a></li>';
        } else {
            echo '<li><a href="signup.php">Sign up</a></li>';
            echo '<li><a href="login.php">Login</a></li>';
        }
        ?>

    </ul>
</nav>