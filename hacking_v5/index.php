<?php
session_start();
include 'DB_Backend.php'; 

        if(isset($_POST['logout'])){
            $_SESSION['user'] = ''; 
        }

        if(isset($_SESSION['user'])){
            
            //only mannen allowed to be logged in
            if(strlen($_SESSION['user']) > 0){
                echo 'Welcome ' .$_SESSION['user']; 
            }else{
                header("Location: /hacking/hacking_v5/login.php");
            }
        }else{
            header("Location: /hacking/hacking_v5/login.php");
        }

        if(isset($_POST['data'])){
            savePost($_POST['data']); 
        }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
    <form method="post">
        <input type="hidden" name="logout" value="logout">
        <input type="submit" value="Logout">
    </form>
    
    <form method="post">
        Post: <input type="text" name="data">
        <input type="submit" value="Send">
    </form>

    <?php
        prinAllPosts(); 
    ?>
</body>
</html>