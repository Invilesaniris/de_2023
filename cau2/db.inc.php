<?php


function connectDB(){
    $host="localhost";
    $username="root";
    $pwd="";
    $dbName="101_php";

    $conn=mysqli_connect($host, $username, $pwd, $dbName);
    if($conn->errno){
        die("connection fail ". $conn->errno);
    }
    return $conn;
}


?>