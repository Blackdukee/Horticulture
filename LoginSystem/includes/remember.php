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
    
   public function isCookieValid(){

            $isValid = false;
            if (isset($_COOKIE['rememberme'])) {
                $decryptionData = base64_decode($_COOKIE['rememberme']);
                $userid = explode("3jdfoikl32j4", $decryptionData);
                $user_id = $userid[1];
                $conn = $this->connect();
                $sql = "SELECT * FROM Ho_Users WHERE users_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $user_id);
                if (!$stmt->execute()) {
                    $stmt->close();
                    header("Location: ../login.php?error=stmtfailed");
                    exit();
                }
                $result = $stmt->get_result();
                if ($row = $result->fetch_assoc()) {
                    $id = $row['users_id'];
                    $username = $row['users_uid'];
                    $isValid = true;
                    if ($isValid) {
                        session_start();
                        $_SESSION['UserName'] = $username;
                        $stmt->close();
                        header("Location: ../home.php");
                        exit();
                    }
                } else {
                    $isValid = false;
                    return $isValid;
                }
                $stmt->close();
            }
        }


}

?>