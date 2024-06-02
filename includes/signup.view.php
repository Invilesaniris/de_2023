<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    

?>

<?php
    function check_signup_errors(){
        if(isset($_SESSION["signup_errors"])){
            $errors=$_SESSION["signup_errors"];
            unset($_SESSION["signup_errors"]);

            foreach($errors as $error){
                echo "<p>".$error."</p>";
                echo "<br>";
            }
        }
        else if(isset($_GET["signup"])&&$_GET["signup"]==="success"){
            echo "<p>signup successs</p>";
            echo "<br>";
        }


    }


?>