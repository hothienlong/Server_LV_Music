<?php
    require('connect.php');
    require('response.php');
    require('advertisementmodel.php');

    $query = "CALL get_all_advertisement_proc();";

    $data = mysqli_query($con , $query);

    $array = [];

    while($row = mysqli_fetch_assoc($data)){
       array_push($array , new Advertisement(
                                    $row['id'],
                                    $row['song_id'],
                                    $row['image'],
                                    $row['content']));
    }

    echo json_encode(new Response(true, null, $array));

?>