<?php
    require("connect.php");
    require("response.php");
    require('songmodel.php');
    require('singermodel.php');

    $song_id = $_POST['song_id'];
    if (strlen($song_id) <= 0) {
        echo json_encode(new Response(false, "Bạn chưa truyền id", []));
        return;
    }


    // $song_id = 1;
    $query = "CALL get_all_singers_of_song_proc('$song_id');";

    $data = mysqli_query($con, $query);
    echo json_encode($data);
    $array = [];

    while ($row = mysqli_fetch_assoc($data)) {
        // echo json_encode($row);
        array_push($array, new Singer(
            $row['singer_id'],
            $row['stage_name'],
            $row['real_name'],
            $row['birthdate'],
            $row['country'],
            $row['information'],
            $row['avatar']
        ));
    }
    echo json_encode(new Response(true, null, $array));
?>
