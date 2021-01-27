<?php
    class SongItem{
        function __construct($id, $name, $image, $song_link, $mv_link, $lyric, $lst_singer_names){
            $this->id = $id;
            $this->name = $name;
            $this->image = $image;
            $this->song_link = $song_link;
            $this->mv_link = $mv_link;
            $this->lyric = $lyric;
            $this->lst_singer_names = $lst_singer_names;
        }
    }
?>