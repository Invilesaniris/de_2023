<?php
function is_input_empty($username, $pwd, $email){
    if(empty($username) || empty($pwd) || empty($email)){
        return true;
    }
    else{
        return false;
    }
}

function is_valid_email($email){
    var_dump($email);
    if($email==="")
        return true;
    $emailPattern="/\w*@gmail.com/";
    $result=preg_match_all($emailPattern, $email);
    return ($result==1)?true:false;
}

function is_username_taken($username){
    include_once "db.inc.php";
    $conn=connectDB();
    $result=$conn->query("select username from users where username='$username';");
    
    $conn->close();
    return $result->num_rows;
}

function is_email_taken($email){
    include_once "db.inc.php";
    $conn=connectDB();
    $result=$conn->query("select email from users where email='$email';");
    
    $conn->close();
    return $result->num_rows;
}

function create_user($username, $pwd, $email){
    include_once "db.inc.php";
    $conn=connectDB();
    $hashedPwd=password_hash($pwd, PASSWORD_BCRYPT);
    $result=$conn->query("insert into users(username,pwd, email) values ('$username','$hashedPwd','$email');");
    
    $conn->close();
    return ($result===false)?false:true;
}

function is_pwd_valid($pwd, $re_pwd){
    return $pwd===$re_pwd;
}



if(!isset($_SESSION)){
    session_start();
}
include_once("db.inc.php");


if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["submit"])){
    $conn=connectDB();
    $username=$_POST["username"];
    $email=$_POST["email"];
    $pwd=$_POST["pwd"];
    $re_pwd=$_POST["re_pwd"];

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
    if(!is_pwd_valid($pwd, $re_pwd)){
        $errors["taken_email"]="password doesn't match";
    }

    if($errors){
        $_SESSION["signup_errors"]=$errors;
        header("location: signup.php?signup=error");
        die();
    }
    
    create_user($username, $pwd, $email);
    
    $conn->close();
    header("Location: signup.php?signup=success");
    die();

}
else{
    header("Location: signup.php");
    die();
}



?>