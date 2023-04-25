

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <?php $arry = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n"); ?>
    <script>
        var arr = <?php echo json_encode($arry); ?>;
        console.log(arr);
    </script>
</body>
</html>