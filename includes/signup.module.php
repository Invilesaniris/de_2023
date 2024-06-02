<?php
session_start();
include_once("db.inc.php");
include_once("signup.modal.php");
include_once("signup.controller.php");


if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["submit"])){
    $conn=connectDB();
    $username=$_POST["username"];
    $email=$_POST["email"];
    $pwd=$_POST["pwd"];

    //error handlers
    $errors=[];
    if(is_input_empty($username, $pwd, $email)){
        $errors["empty_input"]="fill in all fields";
    }
    if(!is_valid_email($email)){
        $errors["invalid_email"]="invalid email used";
    }
    if(is_username_taken($username)){
        $errors["taken_username"]="useranem is taken";
    }
    if(is_email_taken($email)){
        $errors["taken_email"]="email is taken";
    }

    if($errors){
        $_SESSION["signup_errors"]=$errors;
        header("location: ../signup.php?signup=success");
        die();
    }
    
    create_user($username, $pwd, $email);
    
    $conn->close();
    header("Location: ../signup.php?signup=success");
    // if(!create_user($username, $pwd, $email)){

    // }

}
else{
    header("Location: ../signup.php");
}



?>