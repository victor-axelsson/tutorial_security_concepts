<?php
session_start();
include 'DB_Backend.php'; 

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
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

    <h1>Display a post</h1>
    <?php
        printPost($_GET['id']); 
    ?>
    
    <a href="/hacking/hacking_v5/index.php">Back</a>
</body>
</html>