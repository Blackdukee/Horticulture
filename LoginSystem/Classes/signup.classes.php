<?php 

class Sginup extends Dbh {

   public function checkUser($UserName, $UserEmail){
           
         $conn = $this->connect();
            $stmt = $conn->prepare('SELECT users_uid FROM Ho_Users WHERE users_id = ? OR users_email = ?;');
            $stmt->bind_param('ss', $UserName, $UserEmail);
            
            if (!$stmt->execute()) {
                $stmt->close();
                header("Location: /Horticulture/signup.php?error=stmtfailed");
                exit();
            }
            
            $stmt->store_result();
            $resultcheck = $stmt->num_rows > 0;
            $stmt->close();
            
            return $resultcheck;
        }

    
   public function createUser($UserName, $UserEmail, $UserPhone, $UserPassword, $UserAddress) {
       
            $conn = $this->connect();
            $stmt = $conn->prepare("INSERT INTO Ho_Users 
                                    (users_uid, users_pwd, users_email, join_date, users_phone, user_img, users_address ) 
                                    VALUES (?, ?, ?, NOW(), ?, 'Not Set', ?)");
        
            $hash_Pwd = password_hash($UserPassword, PASSWORD_DEFAULT);
            $stmt->bind_param('sssss', $UserName, $hash_Pwd, $UserEmail, $UserPhone, $UserAddress);
        
            if (!$stmt->execute()) {
                $stmt->close();
                header("Location: /Horticulture/signup.php?error=stmtfailed");
                exit();
            }
        
            $stmt->close();
        }


}