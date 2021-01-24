<?php
    require("connect.php");
    require("response.php");
    require('songmodel.php');

    $cate_id = $_POST['cate_id'];
    $query = "CALL get_category_songs_proc('$cate_id');";

    $data = mysqli_query($con, $query);

    $array = [];

    while ($row = mysqli_fetch_assoc($data)) {
        array_push($array, new Song(
            $row['song_id'],
            $row['name'],
            $row['image'],
            $row['link']
        ));
    }
    echo json_encode(new Response(true, null, $array));
?>
