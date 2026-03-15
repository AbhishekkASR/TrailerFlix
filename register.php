<?php

include("config/db.php");

if(isset($_POST['register']))
{

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users(username,password)
        VALUES('$username','$password')";

mysqli_query($conn,$sql);

echo "Registered";

}

?>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="css/style.css">

</head>

<body>


<div class="container">


<div class="left">

<h1>TrailerFlix</h1>

<p>Create new account</p>

</div>


<div class="right">


<div class="login-card">

<h2>Sign Up</h2>

<form method="post">

<input
type="text"
name="username"
placeholder="Username"
required
>

<input
type="password"
name="password"
placeholder="Password"
required
>

<button name="register">

Register

</button>

</form>

<br>

<a href="index.php" style="color:#00c6ff">

Back to login

</a>

</div>


</div>

</div>


</body>
</html>