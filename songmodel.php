<?php
    class Song{
        function __construct($id, $name, $image, $song_link, $mv_link, $lyric){
            $this->id = $id;
            $this->name = $name;
            $this->image = $image;
            $this->song_link = $song_link;
            $this->mv_link = $mv_link;
            $this->lyric = $lyric;
        }
    }
?>