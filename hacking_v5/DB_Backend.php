<?php
    include 'connector.php'; 
    

    function login($username, $password){
        
        
        $con = GetConnecor();
    
        $isAuthenticated = false; 
        
        $username = mysqli_real_escape_string($con, $username); 
        $password = mysqli_real_escape_string($con, $password); 
        
        $sql = "SELECT * FROM user WHERE username='".$username."' and password='".$password."'";
        $result = execute($sql);
        
        while($row = mysqli_fetch_array($result))
        {   
            //if a row is found
            if($row['id']){
                $isAuthenticated = true; 
            }
        }
     
        return $isAuthenticated; 
    
    }


    function savePost($post){
        
        $con = GetConnecor(); 
        
        //$post = mysqli_real_escape_string($con, $post);
        
        $sql = "INSERT INTO guestbook (post) VALUES ('".$post."')"; 
        executeMulti($sql); 
        
    }

    function printPost($id){
        
        $con = GetConnecor();
        
        
        $stmt = $con->prepare("SELECT post FROM guestbook where id=?"); 
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($result);
        $stmt->fetch();

        echo $result;
        $stmt->close();
        $con->close();
        
        
        /*
        $sql = "SELECT * FROM guestbook where id=" .$id; 
        
        $result = execute($sql);
        
        
        while($row = mysqli_fetch_array($result))
        {   
            echo '<p>'.$row['post'].'</p> <hr>'; 
        }
        */
        
    }

    function prinAllPosts(){
        
        $sql = "SELECT * FROM guestbook;"; 
        
        $result = execute($sql);
        
        while($row = mysqli_fetch_array($result))
        {   
            echo '<p>'.$row['post'].'</p> <hr>'; 
            echo '<a href="/hacking/hacking_v5/display.php?id='.$row['id'].'"> Show</a>'; 
        }
        
    }
?>