<?php

/* this is my code for reset password

    which is content the selector, validator that has been created in reset-request.inc.php 
    
*/ 

if (isset($_POST["reset-password-submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password  = $_POST["pwd"];
    $repassword = $_POST["pwd-repeat"];
    if (empty($password) || empty($repassword)) {
        header("Location: ../create-new-password.php?newpwd=empty");
        exit();
    } else if ($password != $repassword) {
        header("Location: ../create-new-password.php?newpwd=pwdnotsame");
        exit();
    }
    // this current time is used to check if the token is expired or not
    $current = date("U");
    
    // this is the connection to the database
    require 'dbh.inc.php';
    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an errorfromhere!";
        exit();
    } else {
    
    // selecting the selector and the current time
        mysqli_stmt_bind_param($stmt, "ss", $selector, $current);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    // checking if the selector is exit or not
    
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request.";
            exit();
        } else {
        
            // this is the token that has been created in reset-request.inc.php 
            $tokenBin = hex2bin($validator);
            // checking if the token is correct or not
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            if ($tokenCheck === false) {

                echo "You need to re-submit your reset request.";
                exit();
                
            } elseif ($tokenCheck === true) {
                // if the token is correct then we will get the email from the database
                $tokenEmail = $row['pwdResetEmail'];
                $sql = "SELECT * FROM ho_users WHERE users_email=?;";
                $stmt = mysqli_stmt_init($conn);
                
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an errorhere2!";
                    exit();
                } else {
                    // selecting the email from the database
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    
                    if ($row = mysqli_fetch_assoc($result)) {
                        echo "There was an errorhere3!";
                        exit();
                    } else {
                        // updating the password in the database
                        $sql = "UPDATE ho_users SET users_pwd=? WHERE users_email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an errorhere4!";
                            exit();
                        }
                        
                        // hashing the password
                        $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        
                        // deleting the token from the database
                        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an errorhere5!";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../login.php?newpwd=passwordupdated");
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../home.php");
}
