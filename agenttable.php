<?php
    session_start();
    if(isset($_SESSION['username'])){
        $conn=mysqli_connect("localhost", "root", "", "test");
        $user_id = $_SESSION['username'];

        if(isset($_GET['agent'])) {
            $agent = $_GET['agent']; 

            $user_id = mysqli_real_escape_string($conn, $user_id);
            $agent = mysqli_real_escape_string($conn, $agent);

            if(isset($_GET['urlimg'])) {
                 $urlimg = $_GET['urlimg']; 
                 $img = mysqli_real_escape_string($conn, $urlimg);

                 mysqli_query($conn, "INSERT INTO agents (username, agent, img) VALUES ('$user_id', '$agent', '$img')");
            }
        } 
        else if(isset($_GET['artist'])) {
            $artist = $_GET['artist']; 

            $user_id = mysqli_real_escape_string($conn, $user_id);
            $artist = mysqli_real_escape_string($conn, $artist);

            if(isset($_GET['urlimg'])) {
                 $urlimg = $_GET['urlimg']; 
                 $img = mysqli_real_escape_string($conn, $urlimg);

                 mysqli_query($conn, "INSERT INTO artists (username, artist, img) VALUES ('$user_id', '$artist', '$img')");
            }
        } 


        mysqli_close($conn);
    }
    else {
    //l'user non è loggato
    header("Location: accedi.php");
    exit(); 
}

?>