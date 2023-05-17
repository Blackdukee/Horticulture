<?php 


session_start();





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="http://localhost/Horticulture/Shop/scss/style2.scss">
    <title>Document</title>
</head>

<body>
    <!-- <div class="containerr">
        <div class="itemsgrid">
        </div>
        <div class="spin" width="100%">
            <div class="spinner-border spin" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div> -->
    <style>
    

    .card {
        width: 385px;
        height: 350px;
        border-radius: 0;
        margin-bottom: 30px;

    }

    .card a {
        text-decoration: none;

    }



    </style>

    <?php include 'C:\xampp\htdocs\Horticulture\header.php';?>

    <div class="PostsPart">
        <div class="latest" style="padding:20px;position:relative;left:5%;bottom:-70px;">
            <h1><span style="color:#232722;">Latest Post</span></h1>
        </div>
        <div class=" containerr">
            <div class=" GridSys">

                <?php
                // Horticulture/Shop/phpfiles/dbconnect.php
                include '../Shop/phpfiles/dbconnect.php';
                $conn = Dbconnect::getInstance()->getConnection();
                $result = mysqli_query($conn,"select * from articles LIMIT 6");
                while($row = mysqli_fetch_assoc($result)){
                        $timestamp = strtotime($row['created_at']); // Convert MySQL date to a timestamp
                        $formattedDate = date('F j, Y', $timestamp);    
                
                    echo '<div class="card col"  id="'.$row['article_id'].'" >
                             <a href="index2.php?id='.$row['article_id'].'"><img src="/Horticulture/blogs/imgs/'.$row['article_img'].'" style="height: 300px;width: 385px;" class="img-fluid"
                                alt="..."></a>
                            <div class="card-body"style="background-color:#d7dad3">
                                <a href="index2.php?id='.$row['article_id'].'"><p class="card-text"><span style="color:#232722;">'.$row['article_title'].'</span></p></a> 
                                <a href="index2.php?id='.$row['article_id'].'"><p class="card-text"><span style="color:#232722;">'.substr($row["article_body"],0,30).'</span></p></a>
                                <p class="card-text"><span style="color:#232722;">'.$formattedDate.'</span></p>
                            </div>
                        </div>';
                }

            ?>

            </div>

        </div>
        <?php include "http://localhost/Horticulture/cartComponent.php" ?>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="http://localhost/Horticulture/Shop/jsfiles/main2.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


        <?php include "http://localhost/Horticulture/footer.php" ?>

</body>

</html>