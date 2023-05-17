<?php

session_start();
// Set up database connection

include 'dbconnect.php';

$conn = Dbconnect::getInstance()->getConnection();

// Connect to database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// fetch limit data 

$limit = 9;
$page = 1;
$output =   '';

if(isset($_POST['page'])){
    $page = $_POST['page'];
   
}

if(isset($_POST['category'])){
     $catagory = $_POST['category'];
    $catagory = '"'.$catagory.'"';
}


if(isset($_POST['id'])){
    
    $id = $_POST['id'];

}
$start_from = ($page-1 )* $limit;
$query = mysqli_query($conn,"SELECT * FROM `product` where product_type like $catagory LIMIT $start_from, $limit ");

$query2 = mysqli_query($conn,"SELECT product_id FROM `favoritesproduct` where users_id =".$_SESSION['userid']);
$arrray = array();
while ( $favarray = mysqli_fetch_array($query2)) {

    array_push($arrray,$favarray['product_id']);
    
}



$output .= '';
$count = 1;
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output .= '
                <div class="card" style="width: 20rem;" id="article'.$row['product_id'].'">
                  <div class="forimg" style> 
                  <img src="imgs/'.$row['product_img'].'" class="card-img-top" alt="..." >  
                  </div>
                  <div class="card-body" style="width: fit-content;height: 166px;">
                    <h5 class="card-title"><a href="index6.php?id='.$row['product_id'].'">'.$row["product_name"].'</a></h5>
                    <p class="card-text">'.substr($row["product_desc"],0,30).'...</p>
                    <a href="#"   class="btn btn-primary" name="addbutton" id="pro'.$row['product_id'].'" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Add to Cart</a>
                    <i class="fa-sharp fa-regular fa-heart  fa-2xl" id="article'.$row['product_id'].'"style="color: #df1638;"></i>

                  </div>
                </div>
              
        ';
    }


} else {
    $output .= '<table class="table table-bordered">
        <tr>
            <td colspan="5">No Data Found</td>
        </tr></table><br />
    ';
}




$output .= '</div>
</div>';

// Pagination code 

$page_query = mysqli_query($conn,"SELECT * FROM `product` where product_type like $catagory");

$totalRecords = mysqli_num_rows($page_query);

$totalPages = ceil($totalRecords/$limit);

$output2 = '';
$output2 .= '<div id="pagina"> 
                <ul class="pagination">';

if($page > 1){
    $previous = $page - 1;
    $output2 .= '<li class="page-item" id="1"><a href="#"  class="page-link" >First</a></li>';
    $output2 .= '<li class="page-item" id="'.$previous.'"><a href="#"  class="page-link"">Previous</a></li>';
}

for($i = 1; $i <= $totalPages; $i++){
        $activeClass = '';
    if ($i == $page) {
        $activeClass = 'active';
    }
    $output2 .= '<li class="page-item '.$activeClass.'" id="'.$i.'"><a href="#"  class="page-link">'.$i.'</a></li>';
}

    if($page < $totalPages){
        $page = $page + 1;
        $output2 .= '<li class="page-item" id="'.$page.'"><a href="#"  class="page-link">Next</a></li>';
        $output2 .= '<li class="page-item" id="'.$totalPages.'"><a href="#"  class="page-link">Last</a></li>';
    }
$output2 .= '</ul></div>';
    

echo $output;

echo $output2;

echo '<jsontag>'.json_encode($arrray).'</jsontag>';