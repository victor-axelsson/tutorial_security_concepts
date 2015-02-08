<?php

    function GetConnecor(){
        return mysqli_connect("localhost", "root", "root", "guestbook_db");
    }

    function executeMulti($cmd){
        $con = GetConnecor();
        $result = mysqli_multi_query($con, $cmd);
        
        if ($result === false) {
            printf("error: %s\n", mysqli_error($con));
        }
        
        mysqli_close($con);
        return $result;
    }

    function execute($cmd){
        $con = GetConnecor();
        $result = mysqli_query($con, $cmd);
        
        if ($result === false) {
            printf("error: %s\n", mysqli_error($con));
        }
        
        mysqli_close($con);
        return $result;
    }

?>