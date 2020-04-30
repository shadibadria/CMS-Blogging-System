<?php

session_start();

    
    session_unset();//erase the user mark as loged in
    session_destroy();

    header( "refresh:0;url='./index.php'" ); 


?>

