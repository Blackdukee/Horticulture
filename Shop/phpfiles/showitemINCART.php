<?php

session_start();
// Set up database connection

include 'dbconnect.php';

$conn = Dbconnect::getInstance()->getConnection();
// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// fetch data from request 

if(isset($_POST['id'])){
    $itemid = $_POST['id'];
    if(isset($_POST['val'])){
        $val = $_POST['val'];
    
    }else{
        $val = null;
    }
}

// insert data into cart table


$query = mysqli_query($conn,"SELECT product_id FROM `cart` where `user_id` =".$_SESSION['userid']);

// Make an array of the cart items ids

$arrayOfCartItems = array();


if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){
        array_push($arrayOfCartItems,$row['product_id']);
    }
}

$output = '';    // this is the output of the cart item
               

if ($arrayOfCartItems == null) {
  $output = '<h3 class="empty">Cart is empty</h3>';
  echo $output;
  exit();

}
$query2  = mysqli_query($conn,"SELECT * FROM `product` where `product_id` in (".implode(',',$arrayOfCartItems).")");



 
                
if(mysqli_num_rows($query2) > 0){
   
   while($row2 = mysqli_fetch_array($query2)){

    // $output .= '<div class="card mb-3" >
    //             <div class="row g-0" name="cardincart">
    //               <div class="col-md-4" style="width:100px">
    //                 <img src="imgs/'.$row2['product_img'].'" class="img-fluid rounded-start" alt="image" style="height:118px;">
    //               </div>
    //               <div class="col-md-8">
    //                 <div class="card-body" style="height: 120px;">
                
    //                   <h5 class="card-title">' . $row2['product_name'] . '</h5>
    //                   <p class="card-text"><b>$' . $row2['product_price'] . '</b></p>
    //                   <p  class="card-textRemove" id="itemToRemove'.$row2['product_id'].'" style="margin-top: -19px;width:60px;" >Remove</p>
                    
    //                 </div>
    //               </div>
    //             </div>
    //           </div>';
        if ($val != null) {
            $output .= '<div class="card mb-3">
                            <div class="card-body d-flex align-items-center">
                                <div class="col-md-4" style="width:100px">
                                <img src="/Horticulture/Shop/imgs/' . $row2['product_img'] . '" class="img-fluid rounded-start itemImgInCart" alt="image" >
                                </div>
                                <div class="card-desc">
                                       <h5 class="card-title">' . $row2['product_name'] . '</h5>
                                        <p class="card-text"><b>Price: $' . $row2['product_price'] . '</b></p>
                                        <p  class="card-textRemove" id="itemToRemove' . $row2['product_id'] . '" style="margin-top: -19px;width:60px;" >Remove</p>
                                </div>
                                <div class="input-group mr-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary minusbtn"  id="minusbtn' . $row2['product_id'] . '" type="button">-</button>
                                    </div>
                                    <input type="number" id="inputnumber' . $row2['product_id'] . '" class="form-control inputnumber" value="' . $val . '" min="1" max="100">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary addbtn"  id="addbtn' . $row2['product_id'] . '"  type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }else{
                
                    $output .= '<div class="card mb-3">
                            <div class="card-body d-flex align-items-center">
                                <div class="col-md-4" style="width:100px">
                                <img src="/Horticulture/Shop/imgs/' . $row2['product_img'] . '" class="img-fluid rounded-start itemImgInCart" alt="image" >
                                </div>
                                <div class="card-desc">
                                       <h5 class="card-title">' . $row2['product_name'] . '</h5>
                                        <p class="card-text"><b>Price: $' . $row2['product_price'] . '</b></p>
                                        <p  class="card-textRemove" id="itemToRemove' . $row2['product_id'] . '" style="margin-top: -19px;width:60px;" >Remove</p>
                                </div>
                                <div class="input-group mr-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary minusbtn"  id="minusbtn' . $row2['product_id'] . '" type="button">-</button>
                                    </div>
                                    <input type="number" id="inputnumber' . $row2['product_id'] . '" class="form-control inputnumber" value="1" min="1" max="100">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary addbtn"  id="addbtn' . $row2['product_id'] . '"  type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
        
        }
   }
   

}

echo $output;