<?php 
include_once "includes/db.inc.php";

$conn=connectDB();

$start=0;
$rows_per_page=3;

$result=$conn->query("select * from users");
$nr_of_rows=$result->num_rows;
$nr_of_pages=ceil($nr_of_rows/$rows_per_page);

if(isset($_GET["page-nr"])){
    $wanted_page=(int)($_GET["page-nr"])-1;
    $start=$wanted_page*$rows_per_page;
}

$result=$conn->query("select * from users limit  $rows_per_page offset $start");


?>