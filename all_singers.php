<?php
    require("connect.php");
    require("response.php");
    require('singermodel.php');

    $query = "CALL get_all_singers_proc();";

    $data = mysqli_query($con, $query);
    $array = [];

    while ($row = mysqli_fetch_assoc($data)) {
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
