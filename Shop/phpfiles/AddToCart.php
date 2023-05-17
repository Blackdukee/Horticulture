<?php
session_start();  // start session
include 'dbconnect.php';

$conn = Dbconnect::getInstance()->getConnection();

// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        
        if(isset($_POST['id'])){
            $itemid = $_POST['id'];
        }
        
        
        $query = mysqli_query($conn,"SELECT product_id FROM `cart` where `product_id` = $itemid");
        $array = array();
        
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                array_push($array,$row['product_id']);
            }
        }
        
        if($array == null){
           
        }else{
           if($itemid == $array[0]){
            echo "Item already in cart";
            exit();
        }
        }
        
       
        // insert item in the cart table
        $sql = "INSERT INTO `cart` (`product_id`, `user_id`) VALUES ('$itemid', '".$_SESSION['userid']."')";
        
           if ($conn->query($sql) === TRUE) {
                   echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

}