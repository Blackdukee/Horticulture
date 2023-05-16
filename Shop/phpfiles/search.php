<?php 

// Set up database connection

include 'dbconnect.php';

$conn = Dbconnect::getInstance()->getConnection();
// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['search'])){
    $search = $_POST['search'];
}
// Query database
$query = "select * from product where product_name like '%".$search."%'";

$result = $conn->query($query);

if ($result) {
 // Fetch rows
 $output = '';
 while ($row = $result->fetch_assoc()) {

        $output .= '<div class="product">
                        <img src="/Horticulture/Shop/imgs/'.$row['product_img'].'" alt="nothing">
                        <div class="item-details">
                          <h2><a href="index6.php?id='.$row['product_id'].'">'.$row['product_name'].'</a></h2>
                          <h3>$'.$row['product_price'].'</h3>
                        </div>
                    </div>';
                      
   
 }
 echo $output;
} else {
    echo 'Query error: ' . mysqli_error($conn);
}