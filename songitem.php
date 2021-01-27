<?php
    require("connect.php");
    require("response.php");
    require('songmodel.php');
    require('singermodel.php');
    require('songitemmodel.php');

    $song_id = $_POST['song_id'];
    $query1 = "CALL get_song_proc('$song_id');";
    $data1 = mysqli_query($con, $query1);
    // echo json_encode($data1);

    $array = [];

    while ($songRow = mysqli_fetch_assoc($data1)) {

        // php sau khi thực hiện 1 query procedure phải có câu lệnh next_result
        $con->next_result();

        $song_id = $songRow['song_id'];
        // echo("song id = " . $song_id);
        $query2 = "CALL get_all_singers_of_song_proc('$song_id');";
        $data2 = mysqli_query($con, $query2);
        // echo json_encode($data2); // data2 = false

        // get all singers name
        $arraySingerNames = [];
        while($singerRow = mysqli_fetch_assoc($data2)){
            array_push($arraySingerNames, $singerRow['stage_name']);
        }

        array_push($array, new SongItem(
            $songRow['song_id'],
            $songRow['name'],
            $songRow['image'],
            $songRow['song_link'],
            $songRow['mv_link'],
            $songRow['lyric'],
            $arraySingerNames
        ));
    }

    echo json_encode(new Response(true, null, $array[0]));

    

?>
