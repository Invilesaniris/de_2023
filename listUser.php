<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "includes/db.inc.php";
        include_once "pagination-module.php"; //********

       

    ?>

    <div id="page-content">
        <?php 
            echo "displaying page: "."of ".$nr_of_pages."<br>";
            while($user=$result->fetch_assoc()){
                echo "========== <br>";
                echo "username: ".$user["username"]."<br>";
                echo "email: ".$user["email"]."<br>";
                echo "password: ".$user["pwd"]."<br>";
                echo "========== <br>";
            }
        ?>
    </div>

    <div id="page-numbering">
        <a href="?page-nr=1">First</a>

        <!-- left button-->
        <?php
            if(!isset($_GET["page-nr"])){?>
                <a href="">Left</a>

        <?php
            }
            else{
                if($_GET["page-nr"]>1){?>
                    <a href="?page-nr=<?php echo (int)($_GET["page-nr"])-1; ?>">Left</a>
        <?php
                }
                else{?>
                    <a href="">Left</a>
        <?php
                }
            }

        ?>
        
        <!-- pages button, automatically display next 3 pages-->
        <div id="page-numbers" style="display:inline">
            <?php 
                $allowed_nr_of_page=3;
                $page=1;
                if(isset($_GET["page-nr"])){
                    $page=$_GET["page-nr"];
                }
                for($count=0; $count<$allowed_nr_of_page; ++$count){
                    if($page+$count<=$nr_of_pages){?>
                        <a href="?page-nr=<?php echo $page+$count;?>"> <?php echo $page+$count;?></a>
                    <?php
                        }
                    ?>
            <?php
                }
            ?>
        </div>
        
        <!-- next button-->
        <?php
            if(!isset($_GET["page-nr"])){?>
                <a href="?page-nr=2">Next</a>
        <?php
            }else{
                if((int)($_GET["page-nr"])>=$nr_of_pages){?>
                    <a href="">Next</a>
        <?php
                }
                else{?>
                     <a href="?page-nr=<?php echo (int)($_GET["page-nr"])+1?>">Next</a>
        <?php 
                    }
                
            }
        ?>
        


    
        <a href="?page-nr=<?php echo $nr_of_pages ?>">Last</a>

        <?php
        ?>
    </div>


</body>
</html>