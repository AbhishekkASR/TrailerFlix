<?php

include("config/db.php");

$page = $_GET['page'];

$limit = 20;

$offset = ($page-1)*$limit;

$sql = "SELECT * FROM movies
WHERE poster IS NOT NULL
AND video_key IS NOT NULL
LIMIT $limit OFFSET $offset
";

$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{

$img = "https://image.tmdb.org/t/p/w500"
.$row['poster'];

?>

<div class="card">

<a href="play.php?v=<?php echo $row['video_key']; ?>">

<div class="thumb">

<img src="<?php echo $img; ?>">

</div>

</a>

<div class="title">

<?php echo $row['title']; ?>

</div>

</div>

</div>

</a>

</div>

<?php } ?>