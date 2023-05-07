

<?php


$servername = "localhost";
$username = "brilliant";
$password = "2112002";
$dbname = "horticulture";

$conn = new mysqli($servername, $username, $password, $dbname);

// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$query2 = mysqli_query($conn,"SELECT product_id FROM `favoritesproduct` where users_id = 1 ");
$arrray = array();
while ( $favarray = mysqli_fetch_array($query2)) {

    array_push($arrray,$favarray['product_id']);
    
}


echo json_encode($arrray);