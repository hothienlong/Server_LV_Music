<?php

    class Advertisement{
        function __construct($id, $song_id, $image, $content){
            $this->id = $id;
            $this->song_id = $song_id;
            $this->image = $image;
            $this->content = $content;
        }
    }
?>