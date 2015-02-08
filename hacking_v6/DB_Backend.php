<?php
    //session_start();

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


    function savePost($post, $csrf){

        if($csrf != null){
            if(strcmp($csrf, $_SESSION['__csrfPost']) == 0){
                $con = GetConnecor();
                $stmt = $con->prepare("INSERT INTO guestbook (post) VALUES (?)"); 

                $stmt->bind_param('s', $post);
                $stmt->execute();

                $stmt->close();
                $con->close();

                $_SESSION['__csrfPost'] = ''; 
            }else{
                //potential csrf attack
            }
        }
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
    }

    /*
        <img src="http://localhost:8888/hacking/hacking_v6/index.php?delete=72" alt="">
        <a href="http://localhost:8888/hacking/hacking_v6/intermidiate_attack.php"> Heyyy duuude </a>  
    */

    function deletePost($id, $csrf){
        if($csrf == $_SESSION['__csrf']){     
            $con = GetConnecor();
            $stmt = $con->prepare("DELETE FROM guestbook where id=?"); 

            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt->close();
            $con->close();
        }else{
            //This might be a csrf attack
        }
    }

    function prinAllPosts(){
        $con = GetConnecor();
        
        $stmt = $con->prepare("SELECT * FROM guestbook"); 
        $stmt->execute();
        $stmt->bind_result($id, $post);
        
        $_SESSION['__csrf'] = uniqid();
        
        while($stmt->fetch()){
            echo $post ."<br>";
            //echo '<a href="/hacking/hacking_v6/index.php?delete='.$id.'">Delete</a><br> <hr>'; 
            echo '<a href="/hacking/hacking_v6/index.php?delete='.$id.'&csrf='.$_SESSION['__csrf'].'">Delete</a><br> <hr>'; 
        }

        $stmt->close();
        $con->close();    
    }
?>