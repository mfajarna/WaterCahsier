<?php
    session_start();

    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        header('location:login.php');
    }


    
?>