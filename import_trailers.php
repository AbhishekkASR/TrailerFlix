<?php

include("config/db.php");

set_time_limit(0);

$file = "dataset/trailer_data.json";

echo "Reading trailers...<br>";

$data = json_decode(
    file_get_contents($file),
    true
);

$count = 0;

$stmt = $conn->prepare(
    "UPDATE movies
     SET video_key=?, site=?
     WHERE movie_id=?"
);

foreach ($data as $item) {

    if (!isset($item['id'])) continue;

    $id = $item['id'];

    if (!isset($item['results'])) continue;

    $key = "";
    $site = "";

    foreach ($item['results'] as $r) {

        if (
            isset($r['site']) &&
            $r['site'] == "YouTube" &&
            isset($r['key'])
        ) {
            $key = $r['key'];
            $site = $r['site'];
            break;
        }
    }

    if ($key == "") continue;

    $stmt->bind_param(
        "ssi",
        $key,
        $site,
        $id
    );

    $stmt->execute();

    $count++;

    if ($count % 50 == 0) {
        echo "Updated $count <br>";
        flush();
    }
}

echo "Done trailers";

?>