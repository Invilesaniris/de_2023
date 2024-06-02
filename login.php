<?php
    session_start();
    include_once "includes/login.view.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        check_login();
    ?>
    <form action="includes/login.module.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username"><br>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd"><br>

        <input type="submit" name="submit" value="Login">

    </form>

    <?php
        if(isset($_SESSION["user_id"])){
            echo '<form action="includes/logout.module.php" method="post">
                    <input type="submit" name="logout" value="dang xuat">
                    </form>';
            
            echo "after logout:";
            var_dump($_SESSION["user_id"]); 
            echo "<br>";
        }
    ?>

    <?php 
        echo "is session variable user_id set to some value: "."<br>";
        var_dump($_SESSION["user_id"]);
        echo "<br>";

        check_login_errors();
        
    ?>

</body>
</html>