<?php 
    session_start();
    require_once("db_connection.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: arial;
        }

        #container {
            border: none;
            width: 100%;
            background: lightgrey;
            text-align: right;
            box-shadow: 2px 2px 10px black;
        }

        h1 {
            background: rgb(56,56,56);
            color: white;
            float: left;
            padding: 5px;
        }

        #bottom-pnl {
            background: rgb(56,56,56);
            color: white;
            text-align: right;
            padding: 8px;
        }
        
        .input{
            width: 150px;
            padding: 5px;
            border-radius: 5px;
            margin: 8px;
            border: none;
        }

        a {
            color: lightblue;
        }

        #login-btn {
            color: whitesmoke;
            background: lightblue;
            width: 80px;
            height: 30px;
            border: none;
            border-radius: 5px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    
    <div id="container">
        <h1 align="center">Login Form</h1>
        <form method="post">
            <input type="text" class="input" placeholder="Username" name="user_name"/>
            <input type="password" class="input" placeholder="Password" name="pwd"/>
            <div id="bottom-pnl">
                <input type="submit" value="Login" id="login-btn" name="login"/>
                <a href="register.php">Register Here</a>
            </div>
        </form>
    </div>

    <?php 
        if(isset($_POST['login'])){
            $user_name = $_POST['user_name'];
            $password = $_POST['pwd'];

            $q = 'SELECT * FROM `users` WHERE `username`="'.$user_name.'" AND `password`="'.$password.'"';

            $r = mysqli_query($connection, $q);
            if($r){
                if(mysqli_num_rows($r) > 0){
                    //The login was successful
                    $_SESSION['username'] = $user_name;
                    header("location:index.php");
                } else {
                    //The login has failed
                    echo 'Your username and/or password are incorrect';
                }
            } else {
                //Error in the query
                echo $q;
            }
        }
    
    ?>

</body>
</html>