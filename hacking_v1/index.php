<!DOCTYPE html>
<html>
<head>
</head>
<body>

    Posted data: <?php 

        if(isset($_POST['data'])){
            if(strlen($_POST['data']) < 6 ){
                echo "The name " .strip_tags($_POST['data']) ." must at least be 7 characters long."; 
            }else{
                echo "Well hello there " .strip_tags($_POST['data']); 
            }
        }


        //echo $_POST['data']; // version 1 
        //echo strip_tags($_POST['data']) ; // version 2

    ?>
    
    <form method="post">
        My data: <input type="text" name="data">
        <input type="submit" value="Send">
    </form>

    


</body>
</html>