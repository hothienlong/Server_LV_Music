<?php

    class Advertisement{
        function __construct($id, $song_id, $ad_image, $content, $song_image, $song_link){
            $this->id = $id;
            $this->song_id = $song_id;
            $this->ad_image = $ad_image;
            $this->content = $content;
            $this->song_image = $song_image;
            $this->song_link = $song_link;
        }
    }
?>