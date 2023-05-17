<?php
session_start();
    include '../Shop/phpfiles/dbconnect.php';
    $conn = Dbconnect::getInstance()->getConnection();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "select * from articles where article_id = '$id' ");
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['article_title'];
        $img = $row['article_img'];
        $body = $row['article_body'];
        $article_id = $row['article_id'];
    }
}else{
    header("location: index.php?error=notfound");
}
  
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

    <link rel="stylesheet" href="../Shop/scss/style2.scss">
    <title>Document</title>
</head>
<body >

    <style>
      body{
      
         background-image:url(/Horticulture/bg3rev.jpg);
      
    } 
       

    </style>
    <?php include 'C:\xampp\htdocs\Horticulture\header.php';?>
    
    <div >
     <img src="http://localhost/Horticulture/blogs/imgs/<?php echo $img?>" width="100%" height="650px" alt="">
    </div>
    <div class="PostBody" >
            <div>
                <h1>
                    <?php echo $title?>
                </h1>
                
                <p>
                    <?php echo $body?>
                </p>
                
                <hr width="80%">                
                <h1>Title h1</h1>
                
                <h1>Title h1</h1>
            </div>
    </div>
    <?php include 'C:\xampp\htdocs\Horticulture\cartComponent.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="http://localhost/Horticulture/Shop/jsfiles/main2.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

        <?php include "http://localhost/Horticulture/footer.php" ?>

</body>
</html>
