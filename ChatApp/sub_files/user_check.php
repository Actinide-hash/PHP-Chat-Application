<?php 
    require_once("db_connection.php");
    if(isset($_POST['user'])){
        $q = 'SELECT * FROM `users` WHERE `username`="'.$_POST['user'].'"';
        $r = mysqli_query($connection, $q);

        if($r){
            if(mysqli_num_rows($r) > 0){
                //Has determined that the user exists, therefore
                echo '<p style="color: red;">User already registered.</p>';
            } else {
                echo '<p style="color: green;">You can take this name</p>';
            }
        } else {
            echo $q;
        }
    }
?>