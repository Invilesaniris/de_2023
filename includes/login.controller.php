<?php
function is_input_empty($username, $pwd){
    if(empty($username) || empty($pwd)){
        return true;
    }
    else{
        return false;
    }
}


function is_username_taken($username){
    include_once "db.inc.php";
    $conn=connectDB();
    $result=$conn->query("select username from users where username='$username';");
    
    $conn->close();
    return $result->num_rows;
}

function get_user($username){
    include_once "db.inc.php";
    $conn=connectDB();
    $result=$conn->query("select * from users where username='$username';");
    
    $conn->close();
    return $result;
}

function is_user_wrong($result){
    if($result->num_rows===0){
        return true;
    }
    else{
        return false;
    }
}

function is_pwd_wrong($pwd, $hashPwd){
   
    if(!password_verify($pwd, $hashPwd)){
        return true;
    }
    else 
        return false;
}




?>