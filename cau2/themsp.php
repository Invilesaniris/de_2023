<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="xulythemsp.php" method="post" enctype="multipart/form-data">
        <label for="tensp">Ten san pham:</label>
        <input type="text" name="tensp"><br>
        <label for="gia">Gia:</label>
        <input type="number" name="gia"><br>
        <label for="hinhmh">Hinh minh hoa:</label>
        <input type="file" name="hinhmh"><br>

        <input type="submit" name="submit" value="them">
    </form>

    <?php 
        if(isset($_SESSION["them_sp_errors"])){
            $errors=$_SESSION["them_sp_errors"];
            unset($_SESSION["them_sp_errors"]);
            foreach($errors as $error){
                echo $error. "<br>";
            }

        }
    ?>

</body>
</html>