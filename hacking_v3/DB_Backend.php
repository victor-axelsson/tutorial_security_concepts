<?php
    include 'connector.php'; 
    

    function savePost($post){
        $con = GetConnecor(); 
        
        $post = mysqli_real_escape_string($con, $post);
      
        $sql = "INSERT INTO guestbook (post) VALUES ('".$post."')"; 
        executeMulti($sql); 
    }

    function prinAllPosts(){
        $sql = "SELECT * FROM guestbook;"; 
        
        $result = execute($sql);
        
        while($row = mysqli_fetch_array($result))
        {   
            echo '<p>'.$row['post'].'</p> <hr>'; 
        }

    }
?>