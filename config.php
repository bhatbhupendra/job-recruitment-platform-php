<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'jobRecPlat';

    //create connection
    $conn = mysqli_connect($servername,$username,$password,$db);
    //check connection
    if(!$conn){
        die("connection faild".mysqli_connect_error());
    }
?>