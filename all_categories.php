<?php
    require('connect.php');
    require('response.php');
    require('categorymodel.php');

    $query = "CALL get_all_categories_proc();";

    $data = mysqli_query($con , $query);

    $array = [];

    while($row = mysqli_fetch_assoc($data)){
       array_push($array , new Category(
                                    $row['id'],
                                    $row['name'],
                                    $row['image']));
    }

    echo json_encode(new Response(true, null, $array));

?>