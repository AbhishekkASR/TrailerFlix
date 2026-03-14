<?php

include("config/db.php");

set_time_limit(0);

$file = "dataset/main_movies.json";

echo "Reading movies...<br>";

$json = file_get_contents($file);
$data = json_decode($json, true);

$count = 0;

/* prepare SQL */

$stmt = $conn->prepare(
    "INSERT INTO movies (movie_id,title,overview)
     VALUES (?, ?, ?)"
);

foreach ($data as $movie) {

    $id = $movie['id'] ?? 0;
    $title = $movie['title'] ?? '';
    $overview = $movie['overview'] ?? '';

    $stmt->bind_param(
        "iss",
        $id,
        $title,
        $overview
    );

    $stmt->execute();

    $count++;

    if ($count % 20 == 0) {
        echo "Inserted $count <br>";
        flush();
    }

    if ($count > 5000) break; // limit for now
}

echo "Done";

?>