

<?php


$servername = "localhost";
$username = "brilliant";
$password = "2112002";
$dbname = "horticulturedb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$stmt = $conn->prepare("SELECT * FROM favorites WHERE article_id = ?");

