<?php
    require('connect.php');
    require('advertisementmodel.php');

    $query = "CALL get_all_advertisement_proc();";

    $data = mysqli_query($con , $query);

    $array = [];

    while($row = mysqli_fetch_assoc($data)){
       array_push($array , new Advertisement(
                                    $row['advertisement_id'],
                                    $row['song_id'],
                                    $row['ad_image'],
                                    $row['content'],
                                    $row['song_image'],
                                    $row['link']));
    }

    echo json_encode($array);

?>