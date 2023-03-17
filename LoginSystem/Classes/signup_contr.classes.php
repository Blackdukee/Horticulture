<?php
class SignupContr extends Sginup {
    private $UserName;
    private $UserEmail;
    private $UserPassword;
    private $UserPasswordRe;
    public function __construct($UserName, $UserEmail, $UserPassword, $UserPasswordRe) {
        $this->UserName = $UserName;
        $this->UserEmail = $UserEmail;
        $this->UserPassword = $UserPassword;
        $this->UserPasswordRe = $UserPasswordRe;
    }
    
    public function signupUser(){
        if($this->emptyInput() !== false){
            header("Location: ../signup.php?error=emptyinput{$this->UserName}");
            exit();
        }
        if($this->invalidUid() !== false){
            header("Location: ../signup.php?error=invaliduid");
            exit();
        }
        if($this->invalidEmail() !== false){
            header("Location: ../signup.php?error=invalidemail");
            exit();
        }
        if($this->pwdMatch() !== false){
            header("Location: ../signup.php?error=passwordsdontmatch");
            exit();
        }
        if($this->uidTakenCheck() !== false){
            header("Location: ../signup.php?error=usertaken");
            exit();
        }
        $this->createUser($this->UserName, $this->UserEmail, $this->UserPassword);
    }
    public function emptyInput() {
        $result = null;
        if(empty($this->UserName) || empty($this->UserEmail) || empty($this->UserPassword) || empty($this->UserPasswordRe)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    public function invalidUid(){
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->UserName)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    public function invalidEmail(){
        $result = false;
        if(!filter_var($this->UserEmail, FILTER_VALIDATE_EMAIL)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    public function pwdMatch(){
        $result = false;
        if($this->UserPassword !== $this->UserPasswordRe){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    
    public function uidTakenCheck(){
        $result = false;
        if(!$this->checkUser($this->UserName, $this->UserEmail)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}


