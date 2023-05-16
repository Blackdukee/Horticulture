<?php

// Set up database connection

include 'dbconnect.php';

$conn = Dbconnect::getInstance()->getConnection();

// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




if(isset($_POST['id'])){
    $itemid = $_POST['id'];
    $userid = 1;
}


// delete items from cart table

$query = mysqli_query($conn,"DELETE FROM `cart` WHERE `product_id` = $itemid and `user_id` = $userid");

if($query){
    echo "success";
} else {
    echo mysqli_error($conn);
}