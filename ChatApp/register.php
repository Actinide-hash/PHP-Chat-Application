<?php require_once("db_connection.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: arial;
        }

        #container {
            border: none;
            width: 300px;
            margin: 0 auto;
            margin-top: 15px;
            background: lightgrey;
            box-shadow: 2px 2px 10px black;
        }
        
        .input{
            width: 92.5%;
            padding: 2%;
            border-radius: 5px;
            border: none;
            margin: 5px;
        }

        h1 {
            background: rgb(56,56,56);
            color: white;
        }

        #checking {
            color: white;
            margin: 5px;
        }

        #bottom {
            background: rgb(56,56,56);
            color: white;
            padding: 5px;
        }

        #register {
            width: 80px;
            height: 30px;
            background: lightblue;
            border-radius: 5px;
            border: none;
            color: whitesmoke;
            margin: 10px;
        }

        #register-title, #bottom, #user-input{
            padding: 15px;
        }

        a {
            color: lightblue;
        }

    </style>
</head>
<body>
    
    <div id="container">
        <h1 id="register-title" align="center">Registration Form</h1>
        <form method="post">
            <div id="user-input">
                <input type="text" placeholder="Username" onkeyup="check_user()" id="username" name="username" class="input" required/>
                <div id="checking">
                    Checking...
                </div>
                <br>
                <input type="password" placeholder="Password" name="password" id="password" class="input" required/>
            </div>
            <div id="bottom">
                <input type="submit" name="register" id="register" value="Register" />
                <a href="login.php">Login Here</a>
            </div>
        </form>
    </div>

    <?php 
        if(isset($_POST['register'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $q = "INSERT INTO `users` (`id`, `username`, `password`) VALUES('', '".$username."', '".$password."')";

            $r = mysqli_query($connection, $q); #The $connection is taken from the variable in db_connection.php

            if($r){
                header("location:login.php");
            } else {
                echo $q;
            }
        }
    ?>
<script src="sub_files/jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    document.getElementById("register").disabled = true;
    function check_user(){
        var username = document.getElementById("username").value;

        //Sending data to the user_check.php file
        $.post("sub_files/user_check.php",
        {
            user: username
        },
        //By sending data to the user_check.php file, we will recieve data using the following function
        function(data, status){

            if(data == '<p style="color: red;">User already registered.</p>'){
                document.getElementById("register").disabled = true;
            } else {
                document.getElementById("register").disabled = false;
            }

            document.getElementById("checking").innerHTML = data;
        }
        );
    }
</script>

</body>
</html>