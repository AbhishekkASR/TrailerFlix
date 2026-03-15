<?php

include("config/db.php");

set_time_limit(0);

$file = "dataset/poster_data.json";

echo "Reading posters...<br>";

$data = json_decode(
    file_get_contents($file),
    true
);

$stmt = $conn->prepare(
"UPDATE movies
 SET poster=?
 WHERE movie_id=?"
);

$count = 0;

foreach ($data as $item)
{

    if (!isset($item['id'])) continue;

    $movie_id = $item['id'];

    if (!isset($item['backdrops'][0]['file_path']))
        continue;

    $poster =
    $item['backdrops'][0]['file_path'];

    $stmt->bind_param(
        "si",
        $poster,
        $movie_id
    );

    $stmt->execute();

    $count++;

    if ($count % 50 == 0)
    {
        echo "Updated $count<br>";
        flush();
    }

}

echo "Done posters";

?>