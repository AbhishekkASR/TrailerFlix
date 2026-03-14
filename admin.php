<?php
session_start();

include("config/db.php");

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin 
            WHERE username='$username' 
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['admin'] = $username;
        header("Location: upload.php");
    }
    else
    {
        echo "Invalid Admin";
    }
}
?>
<link rel="stylesheet" href="css/style.css">
<h2>Admin Login</h2>

<form method="post">

Username:
<input type="text" name="username"><br><br>

Password:
<input type="password" name="password"><br><br>

<button name="login">Login</button>

</form>