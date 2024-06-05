<?php
    session_start();
    $response= array();
    if(isset($_SESSION['username'])) {
         $user_id=$_SESSION['username'];   
         $response['user_id'] = $user_id;
    } 
    else {
        header("Location: accedi.php");
        exit(); 
    }
    
    echo json_encode($response);
?>