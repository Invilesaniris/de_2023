<?php
if(!isset($_SESSION)){
    session_start();
}


function is_empty_field($tensp, $gia, $hinhmh){
    if(empty($tensp) || empty($gia) || $hinhmh["tmp_name"]===""){
        return true;
    }
    return false;
}

function is_taken_ten($tensp){
    include_once "db.inc.php";
    $conn=connectDB();
    $result=$conn->query("select * from sanpham where ten='$tensp';");
    
    if($result->num_rows>0){
        return true;
    }
    else
        return false;   
}

function is_valid_hinhmh(){
    $hinhmh=$_FILES["hinhmh"];
    if(!($hinhmh["type"]=="image/gif" || $hinhmh["type"]=="image/jpeg" || $hinhmh["type"]=="image/pjpeg") ){
        return "not image";
    }
    if(file_exists("./upload/".$hinhmh["tmp_name"])){
        return "file exist";
    }
    
    return "file is valid";
}

// $file=$_FILES["hinhmh"];
// var_dump($file);
// echo "<br>";
// var_dump($file["tmp_name"]);
// echo"<br>";
// var_dump($file["full_path"]);
// echo"<br>";
// var_dump($file["name"]);

$tensp=$_POST["tensp"];
$gia=$_POST["gia"];
$hinhmh=$_FILES["hinhmh"];

$errors=[];
if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["submit"]==="them"){
    if(is_empty_field($tensp, $gia, $hinhmh)){
        $errors["empty_field"]="fill all fields please";
    }
    if(is_taken_ten($tensp)){
        $errors["take_ten"]="ten is taken";
    }
    $img_error=is_valid_hinhmh();
    if($img_error!=="file is valid"){
        $errors["img_error"]=$img_error;
    }

    if($errors){
        $_SESSION["them_sp_errors"]=$errors;
        header("Location: themsp.php?error=true");
        die();
    }

    move_uploaded_file($hinhmh["tmp_name"],"./upload/".$hinhmh["tmp_name"]);
    $hinhmh_path="./upload/".$hinhmh["tmp_name"];
    include_once "db.inc.php";
    $conn=connectDB();
    $res=$conn->query("insert into sanpham (ten, gia, hinhmh) values ('$ten',$gia,'$hinhmh_path');");
    if($res){
        header("Location: themsp.php?them=true");
    }
    else{
        header("Location: themsp.php?them=false");
    }



}
else{
    header("Location: themsp.php");
}


?>