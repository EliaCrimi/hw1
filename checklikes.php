<?php
    session_start();
    $response=array();

    if(isset($_SESSION['username'])){
        $conn = mysqli_connect("localhost", "root", "", "test");

        if(isset($_GET['image'])) {
            $user_id = $_SESSION['username'];
            $image_id = $_GET['image'];

            $user_id = mysqli_real_escape_string($conn, $user_id);
            $image_id = mysqli_real_escape_string($conn, $image_id);

            $query = "SELECT * FROM Likes WHERE username='$user_id' AND image_id='$image_id'";
            $res = mysqli_query($conn, $query);

            if(mysqli_num_rows($res) > 0){
                $response['liked']=true;
            }
            else{
                $response['liked']=false;
            }
        }
    }

    echo json_encode($response);
?>