<?php
    require("connect.php");
    require("response.php");
    require('songmodel.php');


    $query = "CALL get_all_songs_proc();";

    $data = mysqli_query($con, $query);
    // echo json_encode($data);
    $array = [];

    while ($row = mysqli_fetch_assoc($data)) {
        array_push($array, new Song(
            $row['song_id'],
            $row['name'],
            $row['image'],
            $row['song_link'],
            $row['mv_link'],
            $row['lyric'],
        ));
    }
    echo json_encode(new Response(true, null, $array));
?>

