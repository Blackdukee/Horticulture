<?php 


// Set up database connection
$servername = "localhost";
$username = "brilliant";
$password = "2112002";
$dbname = "horticulturedb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// queen lily



$query = mysqli_query($conn,"INSERT INTO `product` (product_name, product_desc, product_price, product_quantity, product_img, product_type) VALUES ('Queen Lily', 'Queen Lily is a beautiful plant', 34, 100, 'queenlily.jpg', 'flower')");