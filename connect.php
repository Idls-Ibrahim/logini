<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "matjar";
    $connect = mysqli_connect($host, $user, $password, $dbname);
    if(!$connect){
        die("error : " . mysqli_connect_error());
    }
?>