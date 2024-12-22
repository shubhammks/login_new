<?php
error_reporting(0);
session_start();
include "db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $sql = " select * from `user` where name='$name'";

    $result = mysqli_query($cn, $sql);

    // echo $result;
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tname = $row["name"];
            $temail = $row["email"];

            $_SESSION['name'] = $tname;
            $_SESSION['email'] = $temail;
         
        }
    }
    if(password_verify($pass,$tpass)){
        $_SESSION['log'] = true;
    }else{
        echo'invalid login';
    }
    if (isset($_SESSION['log'])) {

        header('location: index.php');
        exit();
    } 
}
$cn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/mycodes/login_new/css/login.css">
</head>

<body>

    <?php
    include "nav.php";
    ?>
    <div class="form-container">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" minlength="4" name="pass" id="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>

</html>
