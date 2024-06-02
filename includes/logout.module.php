<?php
session_start();

if($_SERVER["REQUEST_METHOD"]==="POST" && $_POST['logout']){
    
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_name"]);
    
    header("Location: ../login.php?logout=success");
}
else{
    header("Location: ../login.php");
}

?>