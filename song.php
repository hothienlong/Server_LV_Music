<?php
    require("connect.php");
    require("response.php");
    require('songmodel.php');

    $id = $_POST['id'];
    if (strlen($id) <= 0) {
        echo json_encode(new Response(false, "Bạn chưa truyền id", []));
        return;
    }


    $query = "CALL get_song_proc('$id');";

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
