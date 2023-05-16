<?php
class SignupContr extends Sginup {

    private $UserName;
    private $UserEmail;
    private $UserPhone;
    private $UserPassword;
    private $UserPasswordRe;
    
    private $UserAddress;

    public function __construct($UserName, $UserEmail, $UserPhone, $UserPassword, $UserPasswordRe, $UserAddress)
    {

        $this->UserName = $UserName;
        $this->UserEmail = $UserEmail;
        $this->UserPhone = $UserPhone;
        $this->UserPassword = $UserPassword;
        $this->UserPasswordRe = $UserPasswordRe;
        $this->UserAddress = $UserAddress;
    }
    public function signupUser(){
        if($this->emptyInput() !== false){
            header("Location: /Horticulture/signup.php?error=emptyinput{$this->UserName}");
            exit();
        }
        if($this->invalidUid() !== false){
            header("Location: /Horticulture/signup.php?error=invaliduid");
            exit();
        }
        if($this->invalidEmail() !== false){
            header("Location: /Horticulture/signup.php?error=invalidemail");
            exit();
        }
        if($this->pwdMatch() !== false){
            header("Location: /Horticulture/signup.php?error=passwordsdontmatch");
            exit();
        }
        if($this->uidTakenCheck() !== false){
            header("Location: /Horticulture/signup.php?error=usertaken");
            exit();
        }
        if($this->invalidPhone() !== false){
            header("Location: /Horticulture/signup.php?error=invalidphone");
            exit();
        }
        $this->createUser($this->UserName, $this->UserEmail,$this->UserPhone,$this->UserPassword, $this->UserAddress);
    }
    public function invalidPhone(){
        $result = false;
        if(!preg_match("/^[0-9]*$/", $this->UserPhone)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    public function emptyInput() {
        $result = null;
        if(empty($this->UserName) || empty($this->UserEmail) || empty($this->UserPassword) || empty($this->UserPasswordRe || empty($this->UserPhone)|| empty($this->UserAddress))){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    public function invalidUid(){
        $result = false;
        if(!preg_match('/^[a-zA-Z\s]{2,50}$/', $this->UserName)){
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