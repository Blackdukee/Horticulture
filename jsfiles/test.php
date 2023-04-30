   <?php

   session_start();
    require_once 'C:\\xampp\htdocs\\Horticulture\LoginSystem\Classes\\dbh.classes.php';
    $db = new Dbh();
    $result = $db->showFavArticles($_SESSION['userid']);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>  
    <script src="main.js"></script>
</body>
</html>