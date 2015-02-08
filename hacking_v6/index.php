<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

session_start();
include 'DB_Backend.php'; 

        if(isset($_POST['logout'])){
            $_SESSION['user'] = ''; 
        }

        if(isset($_GET['delete'])){
            //deletePost($_GET['delete'], null); 
            deletePost($_GET['delete'], $_GET['csrf']); 
        }

        if(isset($_SESSION['user'])){
            
            //only mannen allowed to be logged in
            if(strlen($_SESSION['user']) > 0){
                echo 'Welcome ' .$_SESSION['user']; 
            }else{
                header("Location: /hacking/hacking_v6/login.php");
            }
        }else{
            header("Location: /hacking/hacking_v6/login.php");
        }

        if(isset($_POST['data'])){
            savePost($_POST['data'], $_POST['csrfPost']);    
            //savePost($_POST['data'], null);    
        }
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
    <form method="POST">
        <input type="hidden" name="logout" value="logout">
        <input type="submit" value="Logout">
    </form>
    
    <form method="POST">
        
        <?php 
         $_SESSION['__csrfPost'] = uniqid(); 
         echo '<input type="hidden" value="'.$_SESSION['__csrfPost'].'" name="csrfPost">'; 
        ?>
        
        
        Post: <input type="text" name="data">
        <input type="submit" value="Send">
    </form>
    


    <?php
        prinAllPosts(); 
    ?>
</body>
</html>