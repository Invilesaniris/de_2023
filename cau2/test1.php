<?php
session_start();
$x=0;
function test1_Static(){
    
    global $x;
    ++$x;
    echo $x;
    echo '<br>';
}



test1_Static();
test1_Static();
test1_Static();
test1_Static();
test1_Static();


?>