<?php

include("config/db.php");

set_time_limit(0);

$file = "dataset/trailer_data.json";

echo "Reading trailers...<br>";

$json = file_get_contents($file);
$data = json_decode($json, true);

$count = 0;

$stmt = $conn->prepare(
    "UPDATE movies
     SET video_key=?, site=?
     WHERE movie_id=?"
);

foreach ($data as $movie) {

    $id = $movie['id'] ?? 0;

    if (!isset($movie['results'][0]['key'])) {
        continue;
    }

    $key = $movie['results'][0]['key'];
    $site = $movie['results'][0]['site'];

    $stmt->bind_param(
        "ssi",
        $key,
        $site,
        $id
    );

    $stmt->execute();

    $count++;

    if ($count % 100 == 0) {
        echo "Updated $count <br>";
        flush();
    }
}

echo "Done trailers";

?>