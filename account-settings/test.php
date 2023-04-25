<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    }
}

   $fileName = basename($_FILES["file"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
echo "Name: ".$name."<br>".$email."<br>".$phone ."<br>".$fileName."<br>".$fileType."<br>";


 


