<?php
error_reporting(0);
// use LDAP\Result;

include 'db.php';
include 'nav.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $hpass= password_hash($pass, PASSWORD_DEFAULT);

    if ($pass == $cpass) {
        $sql = " insert into `user`(name ,email,pass) VALUES('$name', '$email','$hpass')";
        $result = mysqli_query($cn, $sql);
        if ($result) {
            echo '<div class="ins">record inserted</div>';
        }
    } else {
        echo '<div class="ine">Password does not Match </div>';
    }

}

$cn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="/mycodes/login_new/css/signup.css">
</head>

<body>
    <div class="p1">
        <h1>Sign-up Page</h1>
        <div class="con">


            <h2>Sign in</h2>
            <form action="signup.php" method="post">
                <input required type="text" name="name" placeholder="Name" id="name">
                <input required type="text" name="email" placeholder="Email" id="email">
                <input required type="text" name="password" placeholder="Password" id="password">
                <input required type="text" name="cpassword" placeholder="Confirm password" id="cpassword">
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>

