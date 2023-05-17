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

    <?php include 'C:\xampp\htdocs\Horticulture\header.php';?>

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

           <?php include "http://localhost/Horticulture/footer.php" ?>

</body>

</html>