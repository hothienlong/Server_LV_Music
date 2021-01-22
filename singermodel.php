<?php
    class Singer{
        function __construct($singer_id, $stage_name, $real_name, $birthdate, $country, $information, $avatar){
            $this->singer_id = $singer_id;
            $this->stage_name = $stage_name;
            $this->real_name = $real_name;
            $this->birthdate = $birthdate;
            $this->country = $country;
            $this->information = $information;
            $this->avatar = $avatar;
        }
    }
?>