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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="/Horticulture/Shop/scss/style2.scss">
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
    .var {

        display: flex;
        flex-direction: row;
        margin: 10px;
    }

    .var li {
        margin-left: 10px;
    }

    .card {
        width: 385px;
        height: 350px;
        border-radius: 0;
    }

    body {
        background-image: url(/Horticulture/bg3.jpg);
        background-size: cover;
        background-repeat: repeat-y;
        overflow-x: hidden;
    }
    </style>

    <?php include '../header.php' ?>
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
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<div class="card col">
                            <img src="/Horticulture/blogs/imgs/'.$row['article_img'].'" style="height: 300px;width: 385px;" class="img-fluid"
                                alt="...">
                            <div class="card-body" style="background-color:#d7dad3">
                                <p class="card-text"><span style="color:#232722;">'.$row['article_title'].'</span></p>
                            </div>
                        </div>';
                }

            ?>

            </div>

        </div>


        <footer style="margin-top: 50px;background-color:#343a40;">

            <div style="margin-left:20px;">
                <img src=" /Horticulture/Shop/imgs/Icon.png" height="80px" width="150px" alt="">
            </div>
            <div>
                <ul class=" navbar-nav var">
                    <li class=" nav-item ">
                        <b> <a class=" nav-link active" aria-current="page" href="#">Home</a></b>
                    </li>
                    <li class="nav-item">
                        <b><a class="nav-link" href="#">Features</a></b>
                    </li>
                    <li class="nav-item">
                        <b> <a class="nav-link" href="#">Pricing</a></b>
                    </li>
                    <li class="nav-item">
                        <b> <a class="nav-link" href="#">Pricing</a></b>
                    </li>
                </ul>
            </div>
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

</body>

</html>