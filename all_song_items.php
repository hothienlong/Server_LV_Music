<?php
    require("connect.php");
    require("response.php");
    require('songmodel.php');
    require('singermodel.php');

    // $song_id = 1;
    // $query2 = "CALL get_all_singers_of_song_proc('$song_id');";
    // $data2 = mysqli_query($con, $query2);
    // echo json_encode($data2);

    // $con->next_result();


    $query1 = "CALL get_all_songs_proc();";
    $data1 = mysqli_query($con, $query1);
    // echo json_encode($data1);

    $array = [];

    while ($songRow = mysqli_fetch_assoc($data1)) {

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
            $songRow['link'],
            $arraySingerNames
        ));
    }

    echo json_encode(new Response(true, null, $array));

    
    class SongItem{
        function __construct($id, $name, $image, $link, $lst_singer_names){
            $this->id = $id;
            $this->name = $name;
            $this->image = $image;
            $this->link = $link;
            $this->lst_singer_names = $lst_singer_names;
        }
    }
?>
