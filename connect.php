<?php

   $hostname = "localhost";
   $username = "root";
   $password = "long531358";
   $databasename = "longmusic";

   $con = mysqli_connect($hostname,$username,$password,$databasename);

   mysqli_query($con ,"SET NAMES 'utf8'");
?>