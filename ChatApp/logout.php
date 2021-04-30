<?php 
    session_start();
    if(isset($_SESSION['username'])){
        //session is active, let it be destroyed
        unset($_SESSION['username']);
        //Changing the location back to the login page
        header("location:login.php");
    } else {
        //if session not active, then change only the location to teh login page
        header("location:login.php");
    }
?>