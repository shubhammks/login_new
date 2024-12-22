<?php
session_start();
?>
<link rel="stylesheet" href="/mycodes/login_new/css/nav.css">
<nav>
    <div>
        <img width="300px" src="assets/logo.jpeg">
    </div>
    <ul>
        <a href="index.php">
            <li>Home</li>
        </a>
   
        <?php
        if (!isset($_SESSION['log'])) {
            echo '
        <a href="login.php"><li>Login</li></a>
        <a href="signup.php" id="signup"><li>Sign up</li></a>';
        } else {
            echo '<a href="logout.php"><li>Logout</li></a>';

        }
        ?>

    </ul>
</nav>