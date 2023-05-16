<?php

session_start();

include 'phpfiles/dbconnect.php';

// Set up database connection

$dbcon = Dbconnect::getInstance();

$conn = $dbcon->getConnection();

$result = $dbcon->fetchData();


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome 6.2.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="scss/style2.scss">

    <title>Document</title>

</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-light  bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="imgs/Icon.png" alt="Bootstrap" style="height: 60px;">
            </a>
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

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
                    <div class="search-bar">
                        <div class="searchresult">
                            <i class="fa fa-search"> </i>
                            <input type="text" id="item-search" name="" placeholder="Searching ...">
                        </div>

                        <div class="product-list">


                        </div>

                    </div>




                </ul>
                <?php
                        if(isset($_SESSION['UserName']) && $_SESSION['UserImg']!= 'Not Set'){
                        
                                echo '<div class="userpartation"> <div class="img-circle text-center mb-3">
                 
                                    <img class="shadow" id="profileimg"
                                        src="data:image/jpg;charset=utf8;base64,'.base64_encode($_SESSION['UserImg']).'" alt="image" />
                                </div>
                                <!-- <i class="fa-solid fa-gear fa-xl dropdown-toggle" -->
                                <i class="fa-solid fa-cart-plus fa-2xl" id="cart" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                <div class="btn-group dropstart dropdown-left">
                                    <i class="fa-solid fa-gear fa-2xl" data-bs-toggle="dropdown" aria-expanded="false">
                                    </i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/Horticulture/account-settings/index.php">Account Setting</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/Horticulture/LoginSystem/includes/logout.inc.php">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> ';
                            

                      }else if($_SESSION['UserImg']== 'Not Set'){
        
                        
                                echo '<div class="userpartation"> <div class="img-circle text-center mb-3">
                 
                                    <img class="shadow" id="profileimg"
                                        src="/Horticulture/Shop/imgs/default.png" alt="image" />
                                </div>
                                <!-- <i class="fa-solid fa-gear fa-xl dropdown-toggle" -->
                                <i class="fa-solid fa-cart-plus fa-2xl" id="cart" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                <div class="btn-group dropstart dropdown-left">
                                    <i class="fa-solid fa-gear fa-2xl" data-bs-toggle="dropdown" aria-expanded="false">
                                    </i>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/Horticulture/account-settings/index.php">Account Setting</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/Horticulture/LoginSystem/includes/logout.inc.php">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> ';
                
        }
        else{


        echo '
        <a href="/Horticulture/signup.php"><button type="button" class="btn btn-light">Sign in</button></a>
        <a href="/Horticulture/login.php" class="header-login-a"> <button type="button"
                class="btn btn-light">Login</button></a>';
        }
        ?>




            </div>
        </div>
    </nav>

    <div class="intro">

        <div class="bg">

            <img src="imgs/s3.png" alt="empty img">



        </div>


    </div>
    <div class="category">

        <div class="cat">

            <h1>Category</h1>

        </div>


    </div>
    <div class="maintest">

        <div class="catnav">
            <ul class="nav nav-tabs">
                <?php
                  $firstcat = $result->fetch_assoc()['product_type'];
                  $test = '';
                  
                  $test .= '<li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" name="category" href="#'.trim(str_replace([' ', ','], '',$firstcat)).'">'.$firstcat.'</a>
                              </li>';
                              
                  $array = array();
                  array_push($array,str_replace([' ', ','], '',$firstcat));
                    if ($result) {
                     // Fetch rows
                    
                    while ($row = $result->fetch_assoc()) {
        
              
                     $test .= '<li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" name="category" href="#'.trim(str_replace([' ', ','], '',$row['product_type'])).'">'.$row['product_type'].'</a>
                              </li>';
                      array_push($array,trim(str_replace([' ', ','], '',$row['product_type'])));
                    
                    
                    }
                    } else {
                        echo 'Query error: ' . mysqli_error($conn);
                    }
                
                
                    echo $test;
                    
                
                
                ?>

            </ul>
        </div>
        <div>
            <div class="tab-content mt-2">



                <?php 
              $test2 = '<div class="tab-pane fade active show"  id="'.trim(str_replace([' ', ','], '',$array[0])).'">
                            <div class="containerr">
                              <div class="itemsgrid">
                              </div>
                              <div class="spin" width="100%">
                                <div class="spinner-border spin" style="width: 3rem; height: 3rem;" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                              </div>
                            </div>
                          </div>';
                          
          
              echo $test2;
            ?>

            </div>
        </div>
        <div class="container2">

        </div>

    </div>






    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" id="dialog"
        aria-hidden="true">
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
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
    var test2 = <?php echo json_encode($array); ?>;
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="jsfiles/main2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <footer class="footer bg-dark text-light" style="position:relative; bottom:0;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consequat eros vel lectus fermentum,
                        sed feugiat lacus consectetur.</p>
                </div>
                <div class="col-md-6">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li>Email: info@example.com</li>
                        <li>Phone: +1 123 456 789</li>
                        <li>Address: 123 Street, City, Country</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; 2023 Your Company. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>

</html>