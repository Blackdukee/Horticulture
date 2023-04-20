<?php

include_once "C:\\xampp\htdocs\Horticulture\LoginSystem\Classes\dbh.classes.php" ;

class rememberMe extends Dbh {

    
    public function __construct() {
        
    }

    public function remember($userid){
        $encyrptCookiesdata = base64_encode(
        "3jdfoikl32j4{$userid}");
        
        setcookie('rememberme', $encyrptCookiesdata, time() + 60*5,'/');
        
    }
    
    public function isCoocieValid(){
        $isValid = false;
        if(isset($_COOKIE['rememberme'])) {
            $decryptionData = base64_decode($_COOKIE['rememberme']);
            $userid = explode("3jdfoikl32j4", $decryptionData);
            $user_id = $userid[1];
            $sql = "SELECT * FROM Ho_Users WHERE users_id = ?";
            $stmt = $this->connect()->prepare($sql);
            if(!$stmt->execute(array($user_id))){
                $stmt = null;
                header("Location: ../login.php?error=stmtfailed");
                exit();
            }
            if($row = $stmt->fetch()){
                $id = $row['users_id'];
                $username = $row['users_uid'];
                $isValid = true;
                if($isValid){
                    session_start();
                    $_SESSION['UserName'] = $username;
                    $stmt = null;
                    header("Location: ../home.php");
                    exit();
                }
            } else {
                $isValid = false;
                return $isValid;
            }
        }
        
    }

}

?>