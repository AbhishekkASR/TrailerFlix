<?php

session_start();

include("config/db.php");

if(isset($_POST['login']))
{

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users
        WHERE username='$username'
        AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{
    $_SESSION['user']=$username;

    header("Location: dashboard.php");
}
else
{
    echo "Invalid login";
}

}