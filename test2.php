<?php

$host="localhost";
$username="DuyNguyen";
$pwd="S0n0fB1tch!";
// $pwd="111";
$dbName="101_php";

$conn=mysqli_connect($host, $username, $pwd, $dbName);
if($conn->errno){
    die("connection fail ". $conn->errno);
}

$result=$conn->query("select * from users");

while($row=$result->fetch_assoc()){
    foreach($row as $key=>$value){
        
        echo "=============<br>";
        echo "key:".$key." "."value:".$value;
        echo "<br>";
        echo "=============<br>";
    }
}






?>