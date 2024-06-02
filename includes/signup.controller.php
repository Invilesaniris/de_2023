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



?>