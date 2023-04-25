<?php 

class Sginup extends Dbh {

    public function checkUser($UserName, $UserEmail){ 
    
        $stmt = $this->connect()->prepare('SELECT users_uid FROM Ho_Users WHERE users_id = ? OR users_email = ?;');
        if(!$stmt->execute(array($UserName, $UserEmail))){
            $stmt = null;
            header("Location: /Horticulture/signup.php?error=stmtfailed");
            exit();
            
        }
        $resultcheck = null ;
        if($stmt->rowCount() > 0){
            $resultcheck = true;
        return $resultcheck;
        }
    }
    
    public function createUser($UserName, $UserEmail,$UserPhone, $UserPassword){
        $stmt = $this->connect()->prepare("INSERT INTO Ho_Users 
                                            (users_uid, users_pwd, users_email, join_date, users_phone, user_img, users_address ) 
                                            VALUES ( ?, ?, ?, NOW(), ?,'Not Set', 'Not Set')");
        
        $hash_Pwd = password_hash($UserPassword, PASSWORD_DEFAULT);
        if(!$stmt->execute(array($UserName, $hash_Pwd, $UserEmail, $UserPhone))){
            $stmt = null;
            header("Location: /Horticulture/signup.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
}

}