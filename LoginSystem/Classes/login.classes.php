<?php 

class Login extends Dbh{
        
        public function getUser($UserName ,$UserEmail, $UserPassword){
            $stmt = $this->connect()->prepare('SELECT * FROM Ho_Users WHERE  users_email = ? ;');
            
            if(!$stmt->execute(array($UserEmail))){
                $stmt = null;
                header("Location: ../login.php?error=stmtfailed");
                exit();
            }
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("Location: ../login.php?error=wronglogin");
                exit();
            }
            
            $pwdHashed =$stmt->fetchAll(PDO::FETCH_ASSOC);
            $checkPwd = password_verify($UserPassword, $pwdHashed[0]['users_pwd']);
            
            if($checkPwd == false){
                $stmt = null;
                header("Location: ../login.php?error=wrongloginn");
                exit();
            } else if($checkPwd == true){
                $stmt = $this->connect()->prepare('SELECT * FROM Ho_Users WHERE users_uid = ? OR users_email = ? AND users_pwd = ? ;');
                
                if(!$stmt->execute(array($UserName, $UserEmail, $UserPassword))){
                    $stmt = null;
                    header("Location: ../login.php?error=stmtfailed");
                    exit();
                }
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                session_start();
                $_SESSION['userid'] = $pwdHashed[0]['users_id'];
                $_SESSION['UserName'] = $pwdHashed[0]['users_uid'];
                $stmt = null;
                header("Location: ../home.php");
                exit();
            }
        }
        
}