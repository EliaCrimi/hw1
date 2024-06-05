<?php
session_start();
$result = array();
$conn = mysqli_connect("localhost", "root", "", "test");



if(isset($_GET['var1']) && isset($_GET['var2'])) {
    $var2 = $_GET['var2'];
    $var1 = $_GET['var1'];
    if($var1 === "Agenti") {
        $query = "SELECT * FROM agents WHERE username = '$var2'";
    } else if ($var1 === "Artisti") {
        $query = "SELECT * FROM artists WHERE username = '$var2'";
    }
    $res = mysqli_query($conn, $query);
    

    
    while($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
}

?>
