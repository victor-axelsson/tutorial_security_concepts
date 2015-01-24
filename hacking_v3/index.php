<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
    <?php

        include 'DB_Backend.php'; 

        if(isset($_POST['data'])){
            savePost($_POST['data']); 
        }
    ?>
    
    <form method="post">
        Post: <input type="text" name="data">
        <input type="submit" value="Send">
    </form>

    <?php
        prinAllPosts(); 
    ?>
</body>
</html>