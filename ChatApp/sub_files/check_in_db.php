<?php
    require_once("db_connection.php");
    if(isset($_POST['users'])){
        $q = 'SELECT * FROM `users` WHERE `username`="'.$_POST['users'].'"';
        $r = mysqli_query($connection, $q);

        if($r) {
            if(mysqli_num_rows($r) > 0){
                //It means the user is in the database
                while($row = mysqli_fetch_assoc($r)){
                    $username = $row['username'];

                    //Display the users in the database as options
                    echo '<option value="'.$username.'">';
                }
            } else {
                echo '<option value="No User">';
            }
        } else {
            echo $q;
        }
    }
?>