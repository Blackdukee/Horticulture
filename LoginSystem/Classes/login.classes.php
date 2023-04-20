<?php 
include "remember.php";


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
                $stmt = null;
                header("Location: /Horticulture/home.php?error=none");
                exit();
            }
        }
        
}