<?php 
include "C:\\xampp\htdocs\Horticulture\LoginSystem\includes\\remember.php";


class Login extends Dbh{
        
        // fetch the user from the database
            public function getUser($UserName, $UserEmail, $UserPassword, $rememberme){
                    $conn = $this->connect();
                    
                    $stmt = $conn->prepare('SELECT * FROM Ho_Users WHERE users_email = ?;');
                    $stmt->bind_param('s', $UserEmail);
                    
                    if (!$stmt->execute()) {
                        $stmt->close();
                        header("Location: /Horticulture/login.php?error=stmtfailed");
                        exit();
                    }
                    
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows == 0) {
                        $stmt->close();
                        header("Location: /Horticulture/login.php?error=wronglogin");
                        exit();
                    }
                    
                    // Check if the password is correct
                    $row = $result->fetch_assoc();
                    $checkPwd = password_verify($UserPassword, $row['users_pwd']);
                    
                    if ($checkPwd === false) {
                        $stmt->close();
                        header("Location: /Horticulture/login.php?error=wrongloginn");
                        exit();
                    } elseif ($checkPwd === true) {
                        $stmt = $conn->prepare('SELECT * FROM Ho_Users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');
                        $stmt->bind_param('sss', $UserName, $UserEmail, $UserPassword);
                        
                        if (!$stmt->execute()) {
                            $stmt->close();
                            header("Location: /Horticulture/login.php?error=stmtfailed");
                            exit();
                        }
                        
                        $result = $stmt->get_result();
                        $user = $result->fetch_assoc();
                        
                        if ($rememberme == 'on') {
                            $testo = new rememberMe();
                            $testo->remember($row['users_id']);
                        }
                        
                        session_start();
                        $_SESSION['userid'] = $row['users_id'];
                        $_SESSION['UserName'] = $row['users_uid'];
                        $_SESSION['UserEmail'] = $row['users_email'];
                        $_SESSION['UserPhone'] = $row['users_phone'];
                        
                        if ($row['users_address'] == null) {
                            $_SESSION['UserAddress'] = "Not set";
                        } else {
                            $_SESSION['UserAddress'] = $row['users_address'];
                        }
                        
                        if ($row['user_img'] == null) {
                            $_SESSION['UserImg'] = "Not set";
                        } else {
                            $_SESSION['UserImg'] = $row['user_img'];
                        }
                        
                        $stmt->close();
                        header("Location: /Horticulture/home.php?error=none");
                        exit();
                    }
                }
      public function UpdatePassword($oldPass, $NewPass, $checkpass, $UserEmail){
                if ($this->checkOldPass($oldPass, $UserEmail) == true) {
                    if ($oldPass != $NewPass) {
                    if ($NewPass != $checkpass) {
                        header("Location: /Horticulture/account-settings/index.php?error=passwordnotmatch");
                        exit();
                    }
                    
                    $conn = $this->connect();
                    $stmt = $conn->prepare('UPDATE Ho_Users SET users_pwd = ? WHERE users_email = ?;');
                    $hash_Pwd = password_hash($NewPass, PASSWORD_DEFAULT);
                    $stmt->bind_param('ss', $hash_Pwd, $UserEmail);
                    
                    if (!$stmt->execute()) {
                        $stmt->close();
                        header("Location: /Horticulture/account-settings/index.php?error=stmtfailed");
                        exit();
                    }
                    
                    $stmt->close();
                    header("Location: /Horticulture/account-settings/index.php?success=passwordupdated");
                    exit();
                }
                }
                }

        
                 public function checkOldPass($oldPass, $UserEmail) {
                       
                            $conn = $this->connect();
                            $stmt = $conn->prepare('SELECT users_pwd FROM Ho_Users WHERE users_email = ?;');
                            $stmt->bind_param('s', $UserEmail);
                            
                            if (!$stmt->execute()) {
                                $stmt->close();
                                header("Location: /Horticulture/login.php?error=stmtfailed");
                                exit();
                            }
                            
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();
                            $stmt->close();
                            
                            $oldcheck = $row['users_pwd'];
                            $ceckpass = password_verify($oldPass, $row['users_pwd']);
                            return $ceckpass;
                        }
        
        }