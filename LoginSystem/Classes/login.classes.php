<?php 
include "C:\\xampp\htdocs\Horticulture\LoginSystem\includes\\remember.php";


class Login extends Dbh{
        
        // fetch the user from the database
        public function getUser($UserName ,$UserEmail, $UserPassword, $rememberme){
            $stmt = $this->connect()->prepare('SELECT * FROM Ho_Users WHERE  users_email = ? ;');
            
            if(!$stmt->execute(array($UserEmail))){
                $stmt = null;
                header("Location: /Horticulture/login.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("Location: /Horticulture/login.php?error=wronglogin");
                exit();
            }
            
            //check if the password is correct 
            $pwdHashed =$stmt->fetchAll(PDO::FETCH_ASSOC);
            $tee = $pwdHashed[0]['users_pwd'];
            $checkPwd = password_verify($UserPassword, $pwdHashed[0]['users_pwd']);
            
            if($checkPwd == false){
                $stmt = null;
                header("Location: /Horticulture/login.php?error=wrongloginn");
                exit();
            } else if($checkPwd == true){
                
                $stmt = $this->connect()->prepare('SELECT * FROM Ho_Users WHERE users_uid = ? OR users_email = ? AND users_pwd = ? ;');
                
                if(!$stmt->execute(array($UserName, $UserEmail, $UserPassword))){
                    $stmt = null;
                    header("Location: /Horticulture/login.php?error=stmtfailed");
                    exit();
                }
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if($rememberme == 'on'){
                    $testo = new rememberMe();
                    
                $testo->remember($pwdHashed[0]['users_id']);
                
                }
                
                session_start();
                $_SESSION['userid'] = $pwdHashed[0]['users_id'];
                $_SESSION['UserName'] = $pwdHashed[0]['users_uid'];
                $_SESSION['UserEmail'] = $pwdHashed[0]['users_email'];
                $_SESSION['UserPhone'] = $pwdHashed[0]['users_phone'];
            if($pwdHashed[0]['users_address'] == null){
                $_SESSION['UserAddress'] = "Not set";
            } else {
                $_SESSION['UserAddress'] = $pwdHashed[0]['users_address'];
            
            }
            if ($pwdHashed[0]['user_img'] == null) {
                $_SESSION['UserImg'] = "Not set";
            }else{ 
                $_SESSION['UserImg'] = $pwdHashed[0]['user_img'];
            }
               
                $stmt = null;
                header("Location: /Horticulture/home.php?error=none");
                exit();
            }
        }
        public function UpdatePassword($oldPass,$NewPass,$checkpass,$UserEmail){

            if($this->checkOldPass($oldPass,$UserEmail) == true ){
                    if ($oldPass != $NewPass) {
                
                        if ($NewPass != $checkpass) {
                            header("Location: /Horticulture/account-settings/index.php?error=passwordnotmatch");
                            exit();
                        }
                        $stmt = $this->connect()->prepare('UPDATE Ho_Users SET users_pwd = ? WHERE users_email = ? ;');
                        $hash_Pwd = password_hash($NewPass, PASSWORD_DEFAULT);
                        if(!$stmt->execute(array($hash_Pwd, $UserEmail))){
                            $stmt = null;
                            header("Location: /Horticulture/account-settings/index.php?error=stmtfailed");
                            exit();
                        }
                        
                        
                    }
            
            }
        
        }
        
        public function checkOldPass($oldPass,$UserEmail)
        {
            $stmt = $this->connect()->prepare('SELECT users_pwd FROM Ho_Users WHERE  users_email = ? ;');
            
            if(!$stmt->execute(array($UserEmail))){
            $stmt = null;
            header("Location: /Horticulture/login.php?error=stmtfailed");
            exit();
            }
            
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);  
            $oldcheck = $row['users_pwd'];
            $ceckpass = password_verify($oldPass, $row['users_pwd']);
            return $ceckpass;

        }
}