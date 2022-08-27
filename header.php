<?php
session_start();
?>
<nav>
    <div class="main">Blogs</div>
    <ul>

        <li><a href="index.php">Home</a></li>
        <li><a href="test.php">Test</a></li>
        <?php
        if (isset($_SESSION["useruid"])) {
            echo '<li><a href="profile.php">Profile page</a></li>';
            echo '<li><a href="inc/logout.inc.php">Log out</a></li>';
        } else {
            echo '<li><a href="signup.php">Sign up</a></li>';
            echo '<li><a href="login.php">Login</a></li>';
        }
        ?>

    </ul>
</nav>