<?php
    require("connect.php");
    require("response.php");
    require('songmodel.php');

    $song_id = $_POST['song_id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $song_link = $_POST['song_link'];
    $mv_link = $_POST['mv_link'];
    $lyric = $_POST['lyric'];

    if (strlen($song_id) <= 0){
        echo json_encode(new Response(false , "Id bài hát rỗng" ,[]));
        return;
    }
    else if (strlen($name) <= 0){
        echo json_encode(new Response(false , "Tên bài hát rỗng" ,[]));
        return;
    } else if (strlen($song_link) <= 0){
        echo json_encode(new Response(false , "Link bài hát rỗng" ,[]));
        return;
    }

    $query = "CALL modify_song_proc('$song_id','$name','$image','$song_link','$mv_link','$lyric');";

    $data = mysqli_query($con , $query);
    $array = [];
  

    if($data){
        $row = mysqli_fetch_assoc($data);
        array_push($array, new Song($song_id,$name,$image,$song_link,$mv_link,$lyric));
        echo json_encode(new Response(true , null ,$array ));
    }else{
        echo json_encode(new Response(false , "Cập nhật thất bại" ,[]));
    }
?>