<?php
    class Response{
        function __construct($success,$message,$data){
            $this->success=$success;
            $this->message=$message;
            $this->data=$data;
        }
    }
?>