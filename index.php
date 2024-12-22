<?php
error_reporting(0);
session_start();
include('db.php');
include('nav.php');

if(!isset($_SESSION['log'])){
    
    header('location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/mycodes/login_new/css/index.css">
</head>

<body>
    <div class="container">
    <h1>welcome</h1>
    <h2>
        <?php 
        echo ucwords($_SESSION['name']);
        ?>
    </h2>
    <br>    
    <a href="demo.php">Go to quiz</a>
    </div>
</body>

</html>
<?php
include 'footer.php'
?>
