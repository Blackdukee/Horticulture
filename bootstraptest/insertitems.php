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

    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    $itemname = $_POST['name'];
    $itemdesc =addslashes($_POST['desc']);
    $itemprice = $_POST['price'];
    $itemquantity = $_POST['quantity'];
    $itemtype = $_POST['type'];
    if (isset($_FILES['file'])) {

        $fileName = basename($_FILES["file"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $image = $_FILES['file']['tmp_name']; 
        $imgcontent = addslashes(file_get_contents($image)); 
    }else{
        echo "no image";
    }
}

$sql = "INSERT INTO `product` (`product_name`, `product_desc`, `product_price`, `product_quantity`, `product_type`, `product_img`) VALUES ('$itemname', '$itemdesc', '$itemprice', '$itemquantity', '$itemtype', '$imgcontent')";

$sql2 = 'SELECT product_name FROM `product` WHERE `product_name` like "'.$itemname.'"';
$result = $conn->query($sql2);
echo $sql2;

if ($result->num_rows > 0) {
    echo "item already exists";
    
}else{
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



