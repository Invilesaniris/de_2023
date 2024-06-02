<?php
session_start();
include_once("db.inc.php");
include_once("login.model.php");
include_once("login.controller.php");


if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["submit"])){
    $conn=connectDB();
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];

    //error handlers
    $errors=[];
    if(is_input_empty($username, $pwd)){
        $errors["empty_input"]="fill in all fields";
    }
    $result=get_user($username);
    $user=$result->fetch_assoc();
    echo "sfadf";
    var_dump($user);
    echo " asdfafasdfa<br>";
    
 

    if(is_user_wrong($result)){
        $errors["username_wrong"]="username doesn't exist";
    }
    else if(is_pwd_wrong($pwd, $user["pwd"])){
        $errors["pwd_wrong"]="password doesn't match";
    }

    if($errors){
        $_SESSION["login_errors"]=$errors;
        header("location: ../login.php");
        die();
    }
    
    
    
    $_SESSION["user_id"]=$user["id"];
    $_SESSION["user_name"]=$user["username"];
    header("Location: ../login.php");
    
    $conn->close();
   

}
else{
    header("Location: ../login.php");
}



?>