<?php 

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $img = $_POST['img'];
    $email = $_POST['email'];
    
    require_once '../Classes/dbh.classes.php';
    require_once '../Classes/updateData.classes.php';
    require_once '../Classes/updateData_contr.classes.php';
    
    $updateData = new UpdateDataContr();
    $updateData->updateDataContr($name, $address, $phone, $img, $email);
    header("Location: /Horticulture/account-settings/index.php?error=none");
    
}