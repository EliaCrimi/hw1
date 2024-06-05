<?php
session_start();

if(isset($_SESSION['username'])) {
        $conn = mysqli_connect("localhost", "root", "", "test");
        $user_id = $_SESSION['username'];

        if(isset($_GET['image'])) {
            $image_id = $_GET['image']; 

            $user_id = mysqli_real_escape_string($conn, $user_id);
            $image_id = mysqli_real_escape_string($conn, $image_id);

            if(isset($_GET['param'])) {
                $param=$_GET['param'];
                if($param=="click"){
                    mysqli_query($conn, "INSERT INTO Likes (username, image_id) VALUES ('$user_id', '$image_id')");
                }
                else if($param=="unclick"){
                    mysqli_query($conn, "DELETE FROM Likes WHERE username = '$user_id' AND image_id = '$image_id'");
                }
            }
        } 

        mysqli_close($conn);
} else {
    //l'user non è loggato
    header("Location: accedi.php");
    exit(); 
}

?>
