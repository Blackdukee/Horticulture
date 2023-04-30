<?php

session_start();
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

// fetch limit data 

$limit = 9;
$page = 1;
$output =   '';

if(isset($_POST['page'])){
    $page = $_POST['page'];
}
$start_from = ($page-1 )* $limit;
$query = mysqli_query($conn,"SELECT * FROM `product` LIMIT $start_from, $limit");
$query2 = mysqli_query($conn,"SELECT product_id FROM `favoritesproduct` where users_id = 1 ");
$arrray = array();
while ( $favarray = mysqli_fetch_array($query2)) {

    array_push($arrray,$favarray['product_id']);
    
}



$output .= '';
$count = 1;
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output .= '
                <div class="col"> 
                <div class="card" style="width: 20rem; id="article'.$row['product_id'].'">
                  <img src="حمدي.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">'.$row["product_name"].'</h5>
                    <p class="card-text">'.substr($row["product_desc"],0,85).'...</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    <i class="fa-sharp fa-regular fa-heart  fa-2xl" id="article'.$row['product_id'].'"style="color: #005eff;"></i>

                  </div>
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

$page_query = mysqli_query($conn,"SELECT * FROM `product`");

$totalRecords = mysqli_num_rows($page_query);

$totalPages = ceil($totalRecords/$limit);

$output2 = '';
$output2 .= '<ul class="pagination">';

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
$output2 .= '</ul>';
    


echo $output;

echo $output2;

echo '<jsontag>'.json_encode($arrray).'</jsontag>';

                
