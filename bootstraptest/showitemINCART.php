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

// fetch data from request 

if(isset($_POST['id'])){
    $itemid = $_POST['id'];
    $userid = 1;
}

// insert data into cart table
$query = mysqli_query($conn,"INSERT INTO `cart`(`users_id`, `product_id`) VALUES ($userid,$itemid)");


$query = mysqli_query($conn,"SELECT  FROM `cart`");

$output = '<div class="row g-0">
              <div class="col-md-4">
                <img src="silent_voice.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body" style="height: 100px;">
            
                  <h5 class="card-title">Platn name</h5>
                  <p class="card-text"><b>$34</b></p>
                  <p class="card-text" style="margin-top: -19px;">Remove</p>
                  <div class="form-outline">
                    <input type="number" id="typeNumber" class="form-control" min="1" max="100" value="1" />
                    <label class="form-label" for="typeNumber">Quantity</label>
                  </div>
                </div>
              </div>
            </div>';    // this is the output of the cart item
                
                
                
