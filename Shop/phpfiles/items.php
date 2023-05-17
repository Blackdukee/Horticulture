<?php

session_start(); 

// Set up database connection

include 'dbconnect.php';

$conn = Dbconnect::getInstance()->getConnection();

// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// get post data

if (isset($_POST['id'])) {
    $idToRemove = $_POST['id'];
    $remove = $_POST['remove'];

    if ($remove == 'true') {
        $sql = "DELETE FROM `favoritesproduct` WHERE product_id = $idToRemove";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        $sql = "INSERT INTO `favoritesproduct` (`product_id`, `users_id`) VALUES ($idToRemove, ".$_SESSION['userid'].")";
        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $conn->error;
        }

    }
}