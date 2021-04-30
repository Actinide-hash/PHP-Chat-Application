<div id="new-message">
    <p class="m-header">Add New Chat</p>
    <p class="m-nody">
        <form style="text-align: center;" method="post">
            <input type="text" onkeyup="check_in_db()" id="user_add" class="message-input" placeholder="Username" name="user_add"/>

            <br><br>
            <textarea style="resize: none;" class="message-input" placeholder="Write a message..." name="message"></textarea><br>
            <input type="submit" id="send" value="Send" name="send"/>
            <button onclick="document.getElementById('new-message').style.display='none'">Cancel</button>
        </form>
    </p>
    <p class="m-footer">Click send to send a message to start a new chat.</p>
    <!--End of new message-->
</div>

<?php 
    require_once('db_connection.php');
    if(isset($_POST['send'])){
        $senderName = $_SESSION['username'];
        $recieverName = $_POST['user_add'];
        $message = $_POST['message'];
        $date = date("Y-m-d h:i:sa");

        $q = 'INSERT INTO `messages` (`id`,`sender_name`,`reciever_name`,`message_text`,`date_time`) VALUES ("","'.$senderName.'","'.$recieverName.'","'.$message.'", "'.$date.'")';
        $r = mysqli_query($connection, $q);
        if($r){
            //Message sent
            header("location:index.php?user=".$recieverName);
        } else {
            //Query Problem
            echo $q;
        }
    }
?>

<script src="sub_files/jquery-3.4.1.min.js"></script>
<script>
    document.getElementById("send").disabled = true;

    function check_in_db(){
        var username = document.getElementById("user_add").value;

        //Send this user_name to another file check_in_db.php
        $.post("sub_files/check_in_db.php",
        {
            users: username
        },
        //We will recieve the data from the check_in_db.php file
        function(data, status) {
            if (data == '<option value="No User">'){
                //If the user is registered the send button will work
                document.getElementById("send").disabled = true;
            } else {
                //Send button will not work if user is not registered
                document.getElementById("send").disabled = false;
            }
            
        }
        );
    }
</script>