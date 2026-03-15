<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

<title>TrailerFlix</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>


<div class="container">


<div class="left">

<h1>TrailerFlix</h1>

<p>

Unlimited Trailer Library 

</p>

<button>

Explore

</button>

</div>



<div class="right">


<div class="login-card">

<h2>Login</h2>

<form action="login.php" method="post">

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

<button name="login">

Login

</button>

</form>

<div class="signup">

<a href="register.php"
style="color:#00c6ff">

Create Account

</a>

</div>

</div>


</div>


</div>


</body>
</html>