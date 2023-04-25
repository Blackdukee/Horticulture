<?php

include_once 'dbh.classes.php';

class UpdateData extends Dbh {

    public function updateData($name, $address, $phone,$img, $email){
    
        if($img == 'notset'){
            $sql = "UPDATE ho_users SET users_uid = ?,  users_address = ?, users_phone = ? WHERE users_email = ?";
            $stmt = $this->connect()->prepare($sql);
            try{
                $stmt->execute([$name, $address, $phone, $email]);
                $_SESSION['UserName'] = $name;
                $_SESSION['UserPhone'] = $phone;
                $_SESSION['UserAddress'] = $address;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
                header("Location: /Horticulture/account-settings/index.php?error=none");
                exit();
        } else {
            $img2 = $img;
            $sql = "UPDATE ho_users SET users_uid = ?,  users_address = ?, users_phone = ?, user_img = '".$img."' WHERE users_email = ?";
            $stmt = $this->connect()->prepare($sql);
            try {
                $stmt->execute([$name, $address, $phone, $email]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
             }        
        }
    

}