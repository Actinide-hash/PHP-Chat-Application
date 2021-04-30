<?php  
    session_start();
    require_once("../db_connection.php");
    if(isset($_SESSION['username']) and isset($_GET['user'])){
        if(isset($_POST['message'])){
            //Now check for empty message
            if($_POST['message'] != ''){
                // Now from here we can insert data into the database
                $sender_name = $_SESSION['username'];
                $reciever_name = $_GET['user'];
                $message = $_POST['message'];
                $date = date("Y-m-d h:i:sa");

                $q = 'INSERT INTO `messages` (`id`,`sender_name`,`reciever_name`,`message_text`,`date_time`) VALUES ("","'.$sender_name.'","'.$reciever_name.'","'.$message.'", "'.$date.'")';
                $r = mysqli_query($connection, $q);

                if($r){
                    //Message sent
                    ?>
                        <div class="my-message">
                            <a>Me</a>
                            <p><?php echo "$message"; ?></p>
                        </div>
                    <?php
                } else {
                    //Problem in query
                    echo $q;
                }

            } else {
                echo "Please write something first";
            }
        } else {
            echo "Problem with text";
        }
    } else {
        echo "Please login or select a user to send a message.";
    }
?>