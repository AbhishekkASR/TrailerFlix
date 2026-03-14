<?php

include("config/db.php");

set_time_limit(0);

$file = "dataset/poster_data.json";

echo "Reading posters...<br>";

$json = file_get_contents($file);
$data = json_decode($json, true);

$count = 0;

$stmt = $conn->prepare(
    "UPDATE movies
     SET poster=?
     WHERE movie_id=?"
);

foreach ($data as $movie) {

    $id = $movie['id'] ?? 0;

    if (!isset($movie['posters'][0]['file_path'])) {
        continue;
    }

    $poster = $movie['posters'][0]['file_path'];

    $stmt->bind_param(
        "si",
        $poster,
        $id
    );

    $stmt->execute();

    $count++;

    if ($count % 100 == 0) {
        echo "Updated $count <br>";
        flush();
    }
}

echo "Done posters";

?>