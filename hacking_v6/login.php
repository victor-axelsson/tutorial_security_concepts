<?php
session_start();
include 'DB_Backend.php'; 

if(isset($_SESSION['user'])){
            echo "logged in as user: " .$_SESSION['user']; 
        }

        if(isset($_POST['username']) && isset($_POST['password'])){
            if(login($_POST['username'], $_POST['password'])){
                $_SESSION['user'] = $_POST['username']; 
            }else{
                echo 'That is not a valid login'; 
            }    
        }
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
    <form method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Send">
    </form>

</body>
</html>