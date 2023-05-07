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

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `product` WHERE `product_id` = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['product_name'];
    $price = $row['product_price'];
    $description = $row['product_desc'];
    $type = $row['product_type'];
    $image = $row['product_img'];
    $quantity = $row['product_quantity'];
    $id = $row['product_id'];
    $sql = "SELECT * FROM `favoritesproduct` WHERE `product_id` = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row){
        $isFavorite = true;
    }else{
        $isFavorite = false;
    }
}



?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.scss">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="imgs2/brand.png" alt="Bootstrap">
            <b class="icontitle">Hortitech</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <form class="d-flex" role="search">
                    <i class="fa-solid fa-cart-plus fa-2xl" id="cart" style="color:black;" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"></i>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <i class="fa-solid fa-magnifying-glass fa-2xl " type="submit" data-bs-target="search"></i>
                </form>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link ">Disabled</a>
                </li>

            </ul>

        </div>
    </div>
</nav>
  </header>
  <main class="body">
        
        <style>
            .container {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }
        
            .col1 {
             padding: 10px;
            }
        
            .col2 {
                display: grid;
                grid-template-rows: auto auto;
            }
            
            .col3 { 
              display: grid;
              grid-template-columns: auto auto;
            }
            
            .col21 {
                height: 300px;
                
                padding: 10px;
            }
            
            [name = "addbutton"]{
            
                    position: relative;
                    left: 10%;
                    width: 80%;
                    FONT-WEIGHT: 500;
                    height: fit-content;
                    margin-top: 10px;
                    
            }
            
            .col22{
            
                height: 300px;
            
            }
        </style>
        
        <div>
        <div class="container" style="position: relative; top:100px;">
                <img class="col1" src="imgs2/<?php echo $image ?>" style="width:500px;" alt="">
            
            
            <span class="border">
            <div class="col2" >
                <div class="col21" >
                    
                    <div class="col3">
                        <div>
                        <h3 style="color:gray;"><?php  echo $name ?></h3>
                          <p><b>Type:<?php echo $type;  ?></b> </p>
                          <b>Price:$<?php echo $price;   ?></b>
                          <p><b>Quantity:<?php echo $quantity;  ?></b></p> 
                        </div>
                        <div style="margin-top:20px">
                         <h5> <i class="fa-sharp fa-regular fa-heart  fa-2xl" id="article<?PHP echo $id; ?>"style="color: #df1638 ;"></i></h5>
                        </div>
                    </div>
               
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text bg-white">Quantity:</span>
                            <input type="number" class="form-control" value="1" min="1" max="100">
                        </div>
                    </div>


                    <div class="position-relative" width="100%" style="height:80px;">
      
                           <div class="position-absolute top-50 start-50 translate-middle">
                           
                         <a href="#" type="button" name="addbutton" id="pro<?php echo $id; ?>" data-bs-toggle="modal"
                          data-bs-target="#exampleModal" class="btn btn-outline-dark">ADD TO CART</a>
                           </div>
    
                    </div>
           


                </div>
                <div class="accordion col22" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                              <b>Description</b>  
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                               <?php echo $description;?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        
        <div class="feature" style="height:700px; width:80%; margin-top:200px; background-color:gray;">
        
         <!-- #region -->
         <div class="card" style="background-color:orangered; border-color:darkblue;">
           <img class="card-img-top" src="imgs/Icon.png" alt="Title">
           <div class="card-body">
             <h4 class="card-title">Title</h4>
             <p class="card-text">Text</p>
           </div>
         </div>
        </div>
        
        
        
        </div>
        
        
        
        
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" id="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div style="height: 300px; overflow-y:auto;">
              <ul class="list-group">
                <div class="cart-spin spinner-border" style="width: 3rem; height: 3rem;" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>

              </ul>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Go To Payment</button>
        </div>
      </div>
    </div>
  </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="main2.js"></script>
</body>

</html>