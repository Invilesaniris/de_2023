<?php
    if(!isset($_SESSION)){
        session_start();
    }

    // session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="xylydk.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username"><br>
        <label for="email">Email:</label>
        <input type="text" name="email"><br>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd"><br>
        <label for="re_pwd">Re-Password:</label>
        <input type="password" name="re_pwd"><br>

        <input type="submit" name="submit" value="Sign up">
    </form>

    <?php 
        if(isset($_SESSION["signup_errors"])){
            $errors=$_SESSION["signup_errors"];
            unset($_SESSION["signup_errors"]);

            foreach($errors as $error){
                echo $error."<br>";
            }


        }
        
    ?>

</body>
</html>