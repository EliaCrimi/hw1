<?php
session_start();
if(isset($_GET['artistiagenti']) && isset($_SESSION['username'])) {

    $username=$_SESSION['username'];
    $artage = $_GET['artistiagenti'];
    $curl = curl_init();

    $url = "http://localhost/API.php?var1=" . urlencode($artage) . "&var2=" . urlencode($username);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($curl);
   
    // Output the raw result
    echo $result;

    



    curl_close($curl);
}
?>
