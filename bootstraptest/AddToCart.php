<?php 

// Set up database connection
$servername = "localhost";
$username = "brilliant";
$password = "2112002";
$dbname = "horticulture";

$conn = new mysqli($servername, $username, $password, $dbname);

// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        
        if(isset($_POST['id'])){
            $itemid = $_POST['id'];
            $userid = 1;
            echo $itemid;
            echo $userid;
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
        $sql = "INSERT INTO `cart` (`product_id`, `user_id`) VALUES ('$itemid', '$userid')";
        
           if ($conn->query($sql) === TRUE) {
                   echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

}