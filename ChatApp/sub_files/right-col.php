<!--
<div id="reciever-name">
    <h3><?php echo $_GET['user'];?></h3>
</div>
-->
<div id="right-col-container">
    <div id="messages-container">

        <?php 
            $no_message = false;

            if(isset($_GET['user'])){
                $_GET['user'] = $_GET['user'];
            } else {
                // user variable is not in the url so select the last user you sent a message to
                $q = 'SELECT `sender_name`, `reciever_name` FROM `messages` WHERE `sender_name`="'.$_SESSION['username'].'" OR `reciever_name`="'.$_SESSION['username'].'" ORDER BY `date_time` DESC LIMIT 1';

                $r = mysqli_query($connection, $q);

                if($r){
                    if(mysqli_num_rows($r) > 0){
                        while($row = mysqli_fetch_assoc($r)){
                            $sender_name = $row['sender_name'];
                            $reciever_name = $row['reciever_name'];

                            if($_SESSION['username'] == $sender_name){
                                $_GET['user'] = $reciever_name;
                            } else {
                                $_GET['user'] = $sender_name;
                            }
                        }
                    } else {
                        //This user hasn't sent any message
                        echo 'No message from you.';
                        $no_message = true;
                    }
                } else {
                    //Query problem
                    echo $q;
                }

            }
            
            if($no_message == false){

                $q = 'SELECT * FROM `messages` WHERE `sender_name`="'.$_SESSION['username'].'" AND `reciever_name` = "'.$_GET['user'].'" OR `sender_name`="'.$_GET['user'].'" AND `reciever_name`="'.$_SESSION['username'].'"';
                $r  = mysqli_query($connection, $q);

                if ($r) {
                    //Query successful
                    while($row = mysqli_fetch_assoc($r)){
                        $sender_name = $row['sender_name'];
                        $reciever_name = $row['reciever_name'];
                        $message = $row['message_text'];
                        $date = $row['date_time'];

                        //Check who is the sender
                        if($sender_name == $_SESSION['username']){
                            //show the message that is sent by the sender
                            ?>
                                <div class="my-message">
                                    <a>Me</a>
                                    <p><?php echo "$message"; ?></p>
                                </div>
                            <?php
                        } else {
                            //Show the message that was sent by the other chat
                            ?>
                                <div class="their-message">
                                    <a><?php echo "$sender_name"; ?></a>
                                    <p><?php echo "$message"; ?></p>
                                </div>
                            <?php
                        }
                    }
                } else {
                    //Query problem
                    echo $q;
                }
                
                //End of no_message
            }
        ?>

        <!--End of messages container-->
    </div>
    <form method="post" id="message-form" action="sub_files\sending_process.php?user=<?php echo $_GET['user']; ?>">
        <textarea name="message" class="textarea" id="message-text" placeholder="Enter a message..."></textarea>
        <input type="submit" id="send-btn" name="send-btn" value="Send">
    </form>
    <!--End of right column container-->
</div>

<script src="sub_files/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>


$("document").ready(function(){

    //Submit the message form to sending-process.php using Jquery Ajax
    $("#message-form").submit(function(){
        $.ajax({
            data: $(this).serialize(),
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            success: function(data, status){
                //alert(data);
                $("#message-text").val("");
                document.getElementById("messages-container").innerHTML += data;
            }
        });
        return false;
    });


});





</script>