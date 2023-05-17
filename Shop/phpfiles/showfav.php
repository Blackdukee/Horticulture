<?php

session_start();



include 'dbconnect.php';

$conn = Dbconnect::getInstance()->getConnection();
// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$query2 = mysqli_query($conn,"SELECT product_id FROM `favoritesproduct` where users_id =".$_SESSION['userid']);
$arrray = array();
while ( $favarray = mysqli_fetch_array($query2)) {

    array_push($arrray,$favarray['product_id']);
    
}


echo json_encode($arrray);