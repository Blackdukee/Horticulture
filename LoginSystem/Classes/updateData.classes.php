<?php

include_once 'dbh.classes.php';

class UpdateData extends Dbh {

   public function updateData($name, $address, $phone, $img, $email){
        
            $conn = $this->connect();
            
            if ($img == 'notset') {
                $sql = "UPDATE ho_users SET users_uid = ?,  users_address = ?, users_phone = ? WHERE users_email = ?";
                $stmt = $conn->prepare($sql);
                try {
                    $stmt->bind_param('ssss', $name, $address, $phone, $email);
                    $stmt->execute();
                    $_SESSION['UserName'] = $name;
                    $_SESSION['UserPhone'] = $phone;
                    $_SESSION['UserAddress'] = $address;
                } catch (mysqli_sql_exception $e) {
                    echo $e->getMessage();
                }
                $stmt->close();
                header("Location: /Horticulture/account-settings/index.php?error=none");
                exit();
            } else {
                $img2 = $img;
                try {
                
                   $query = mysqli_query($conn, "UPDATE ho_users SET users_uid = $name,  users_address = $address, users_phone = ?, user_img = $img WHERE users_email = $email");

                } catch (mysqli_sql_exception $e) {
                    echo $e->getMessage();
                }
            }
        }

    

}