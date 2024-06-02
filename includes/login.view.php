<?php 
    session_start();

?>

<?php
    function check_login_errors(){
        if(isset($_SESSION["login_errors"])){
            $errors=$_SESSION["login_errors"];
            unset($_SESSION["login_errors"]);

            foreach($errors as $error){
                echo "<p>".$error."</p>";
                echo "<br>";
            }
        }
        else if(isset($_GET["login"])&&$_GET["login"]==="success"){
            echo "<p>login successs</p>";
            echo "<br>";
        }


    }

    function check_login(){
        if(isset($_SESSION["user_id"])){
            echo "Welcome username:".$_SESSION["user_name"];
            echo "<br>";
        }
        else{
            echo "You are not login";
            echo "<br>";
        }
    }


?>