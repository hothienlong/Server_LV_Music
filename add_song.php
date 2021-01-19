<?php
    require("connect.php");
    require("response.php");
    require('songmodel.php');

    $name = $_POST['name'];
    $image = $_POST['image'];
    $link = $_POST['link'];

    if (strlen($name) <= 0){
        echo json_encode(new Response(false , "Tên bài hát rỗng" ,[]));
        return;
    } else if (strlen($link) <= 0){
        echo json_encode(new Response(false , "Link bài hát rỗng" ,[]));
        return;
    }

    $query = "CALL add_song_proc('$name','$image','$link')";

    $data = mysqli_query($con , $query);
    $array = [];
  
    if($data){
        $row = mysqli_fetch_assoc($data);
        array_push($array, new Song($row['last_id'] ,$name,$image,$link) );
        echo json_encode(new Response(true , null ,$array ));
    }else{
        echo json_encode(new Response(false , "Thêm thất bại" ,[]));
    }
?>