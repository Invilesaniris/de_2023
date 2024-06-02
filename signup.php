<?php
    if(!isset($_SESSION)){
        session_start();
    }

    // session_start();
    include_once "includes/signup.view.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="includes/signup.module.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username"><br>
        <label for="email">Email:</label>
        <input type="text" name="email"><br>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd"><br>

        <input type="submit" name="submit" value="Sign up">

    </form>

    <?php 
        
        check_signup_errors();
        
    ?>

</body>
</html>