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

<title>TrailerFlix</title>

<style>

body{
margin:0;
font-family:Arial;
background:#0b1220;
color:white;
}


/* HEADER */

.header{

position:fixed;
top:0;
left:0;
right:0;

height:70px;

display:flex;
align-items:center;
justify-content:center;

background:rgba(10,15,30,0.9);

backdrop-filter:blur(10px);

box-shadow:0 0 20px #04e2ff;

z-index:1000;

}


/* LOGO */

.logo{

position:absolute;
left:20px;

color:#04e2ff;
font-size:22px;
font-weight:bold;

text-shadow:0 0 10px #e90e0e;

}


/* SEARCH */

.search{

width:400px;

padding:8px;

border-radius:20px;
border:none;

outline:none;

}


/* GRID */

.container{

margin-top:150px;

display:grid;

grid-template-columns:repeat(auto-fill,300px);

gap:25px;

justify-content:center;

}


/* CARD */

.card{

width:300px;

cursor:pointer;

transition:0.3s;

}


.card img{

width:100%;
height:170px;

border-radius:10px;

transition:0.3s;

}


/* GLOW HOVER */

.card:hover img{

box-shadow:
0 0 10px #e90e0e,
0 0 20px #4ce90e,
0 0 40px #0ea5e9;

transform:scale(1.05);

}


/* TITLE */

.title{

margin-top:5px;
font-size:15px;
font-weight:bold;

}


/* OVERVIEW */

.overview{

font-size:12px;
color:#ddd;

background:rgba(14,165,233,0.08);

padding:10px;

border-radius:10px;

margin-top:8px;

box-shadow:
0 0 5px rgba(14,165,233,0.4);

height:100px;
overflow:hidden;

}
</style>

</head>

<body>



<!-- HEADER -->

<div class="header">

<div class="logo">

TrailerFlix

</div>

<form method="GET">

<input
class="search"
name="search"
placeholder="Search"
value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">

</form>

</div>



<!-- MOVIES -->

<div class="container">

<?php

if(isset($_GET['search']) && $_GET['search'] != "")
{

$search = mysqli_real_escape_string($conn, $_GET['search']);

$sql = "
SELECT movie_id, title, poster, overview, video_key
FROM movies
WHERE title LIKE '%$search%'
GROUP BY movie_id
LIMIT 5000
";

}
else
{

$sql = "
SELECT movie_id, title, poster, overview, video_key
FROM movies
GROUP BY movie_id
LIMIT 5000
";

}

$res = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($res))
{

$img = "https://image.tmdb.org/t/p/w500".$row['poster'];

?>

<div class="card">

<a href="play.php?v=<?php echo $row['video_key']; ?>">

<img src="<?php echo $img; ?>">

</a>

<div class="title">

<?php echo $row['title']; ?>

</div>

<div class="overview">

<?php echo $row['overview']; ?>

</div>

</div>

<?php } ?>

</div>



</body>

</html>