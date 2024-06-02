<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        include_once "db.inc.php";
        $conn=connectDB();
        $res=$conn->query("select * from sanpham");
        while($sanpham=$res->fetch_assoc()){?>

        <div id="<?php echo $sanpham["id"] ?>">
            <p>Ten: <?php echo $sanpham["ten"] ?></p>   
            <p>Gia: <?php echo $sanpham["gia"] ?></p> 
            <p>Hinh:</p>
            <img src="<?php echo $sanpham["hinhmh"] ?>" alt="">
        </div>
        <br>

    <?php
        }
    ?>



    ?>


</body>
</html>