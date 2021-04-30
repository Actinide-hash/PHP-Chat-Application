<div id="left-col-container">

<?php

    $q = 'SELECT DISTINCT `reciever_name`, `sender_name` FROM `messages` WHERE `sender_name`="'.$_SESSION['username'].'" OR `reciever_name`="'.$_SESSION['username'].'" ORDER BY `date_time` DESC';

    $r = mysqli_query($connection, $q);

    if($r){
        if(mysqli_num_rows($r)>0){
            $counter = 0;
            $added_user = array();
            while($row=mysqli_fetch_assoc($r)){
                $sender_name = $row['sender_name'];
                $reciever_name = $row['reciever_name'];

                if($_SESSION['username'] == $sender_name){
                    //Add the reciever name but only once
                    if(in_array($reciever_name, $added_user)){
                        //Don't add the reciever_name if it already exists

                    } else {
                        //Adds the reciever_name
                        ?>
                            <div class="grey-bg">
                                <img class="profile-image" src="Images/Profile-512.png">
                                <?php echo '<a href="?user='.$reciever_name.'">'.$reciever_name.'</a>'; ?>
                            </div>
                        <?php
                        //Since we added the reciever_name, we'll add it to the array
                        $added_user = array($counter => $reciever_name);
                        //Increment the counter
                        $counter++;

                    }
                } elseif($_SESSION['username'] == $reciever_name){
                    //Add the sender name but only once
                    if(in_array($sender_name, $added_user)){
                        //Don't add the sender_name if it already exists

                    } else {
                        //Adds the sender_name
                        ?>
                            <div class="grey-bg">
                                <img class="profile-image" src="Images/Profile-512.png">
                                <?php echo '<a href="?user='.$sender_name.'">'.$sender_name.'</a>'?>
                            </div>
                        <?php
                        //Since we added the sender_name, we'll add it to the array
                        $added_user = array($counter => $sender_name);
                        //Increment the counter
                        $counter++;

                    }
                }
            }
        }
    } else {
        //No message sent
        echo 'no user';
    }

?>

        <!--End of left column container-->
    </div>