<?php
session_start();
include("config/db.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['user']=$email;
        header("Location: dashboard.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<div class="box">

<h2>Login</h2>

<form method="post">

Email
<input type="email" name="email">

Password
<input type="password" name="password">

<button name="login">Login</button>

</form>

</div>

</div>

</body>
</html>