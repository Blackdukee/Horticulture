<?php

    session_start();
    
    require_once 'C:\\xampp\htdocs\\Horticulture\LoginSystem\Classes\dbh.classes.php';
    require_once 'C:\\xampp\htdocs\\Horticulture\LoginSystem\Classes\updateData.classes.php';
    require_once 'C:\\xampp\htdocs\\Horticulture\LoginSystem\Classes\updateData_contr.classes.php';
    
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        $name = $_POST['UserName'];
        $email = $_SESSION['UserEmail'];
        $phone = $_POST['UserPhone'];
        $address = $_POST['UserAddress'];


    if (isset($_FILES['file'])) {
    
         $fileName = basename($_FILES["file"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
       


        if(empty($fileName)) {

            $up = new UpdateDataContr();
            $up->updateDataContr($name, $address, $phone,"notset", $email);
            


        }else{
        
                 if(in_array($fileType, $allowTypes)){ 
                 
                    $image = $_FILES['file']['tmp_name']; 
                    $imgContent = addslashes(file_get_contents($image)); 
                $up = new UpdateDataContr();
                $up->updateDataContr($name, $address, $phone, $imgContent, $email);
                
                $_SESSION['UserImg'] = file_get_contents($image);
                $_SESSION['UserName'] = $name;
                $_SESSION['UserPhone'] = $phone;
                $_SESSION['UserAddress'] = $address;

            } else {

                echo 'not ok';
            }
            echo $fileName;
            echo $fileExtenion[1];
    }
        
    
    }}
    
    header("Location: /Horticulture/account-settings/index.php?error=none");
?>