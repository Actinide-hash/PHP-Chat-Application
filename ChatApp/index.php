<?php
    session_start();
    if(isset($_SESSION['username'])){
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?= $_SESSION['username'] ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        <?php require_once("sub_files/style.php"); ?>
    </style>
</head>
<body>

    <?php require_once("sub_files/new-message.php"); ?>

    <div id="container">

        <div id="menu">
            <?php 
                echo $_SESSION['username']; 
                echo '<a href="logout.php" style="float: right; font-size: 12pt; color: lightblue;">Log out</a>';
            ?>
            <br>
            <button id="add-chat-btn" onclick="document.getElementById('new-message').style.display='block'">+ New Chat</button>

        </div>

        <div id="left-col">
            <?php require_once("sub_files/left-col.php") ?>
            <!--End of left column-->
        </div>

        <div id="right-col">
            <?php require_once("sub_files/right-col.php") ?>
            <!--End of right column-->
        </div>
    </div>

</body>
</html>


<?php
    }
    
?>