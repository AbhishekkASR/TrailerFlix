<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <div class="logo">TrailerFlix</div>
    <div>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="main">

<div class="sidebar">
    <div>🏠</div>
    <div>🎬</div>
    <div>⚙</div>
</div>

<div class="content">

<?php

$sql = "SELECT * FROM videos";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);
?>

<div class="player">

<h3><?php echo $row['title']; ?></h3>

<video width="100%" controls>
<source src="videos/<?php echo $row['filename']; ?>">
</video>

</div>

</div>

<div class="right">

<h3>You May Like</h3>

<?php

mysqli_data_seek($result,0);

while($r = mysqli_fetch_assoc($result))
{
?>

<div class="video-item">

<img src="https://via.placeholder.com/80x60">

<div>
<?php echo $r['title']; ?>
</div>

</div>

<?php
}
?>

</div>

</div>

</body>
</html>