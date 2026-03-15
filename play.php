<?php

include("config/db.php");

$key = $_GET['v'];

?>

<!DOCTYPE html>
<html>

<head>

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

text-shadow:0 0 10px #ff0000;

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

margin-top:90px;

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
0 0 10px #0ea5e9,
0 0 20px #0ea5e9,
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
color:#aaa;

height:35px;
overflow:hidden;

}

<style>

body{
margin:0;
font-family:Arial;
background:#262222;
color:gray;
}

/* HEADER */

.header{
height:60px;
background:#111;
display:flex;
align-items:center;
padding:0 20px;
}

.logo{
color:#04e2ff;
font-size:20px;
font-weight:bold;
}


/* THEATRE MODE */

.theatre{

width:100%;
height:calc(100vh - 60px);

display:flex;
justify-content:center;
align-items:flex-start;

padding-top:20px;

}


/* VIDEO */

.video{

width:100%;
max-width:2000px;

}


.video iframe{

width:100%;
height:56vw;

max-height:900px;

border:none;
border-radius:20px;

box-shadow:0 0 20px black;

}


/* TITLE */

.title{

margin-top:10px;
font-size:18px;

}


/* ACTION */

.actions{

margin-top:5px;
color:#aaa;

}


/* CHANNEL */

.channel{

margin-top:10px;
display:flex;
align-items:center;

}

.avatar{

width:40px;
height:40px;
background:red;
border-radius:50%;
margin-right:10px;

}

.subscribe{

margin-left:auto;
background:red;
border:none;
color:gray;
padding:8px 15px;
cursor:pointer;

}


/* RESPONSIVE */

@media (max-width:750px){

.video iframe{

height:56vw;

}

}

</style>

</head>

<body>



<div class="header">

<div class="logoBox">

<div class="logo">

TRAILFLIX

</div>

</div>

</div>



<div class="theatre">

<div class="video">

<iframe
src="https://www.youtube.com/embed/<?php echo $key; ?>"
allowfullscreen>
</iframe>




</body>

</html>