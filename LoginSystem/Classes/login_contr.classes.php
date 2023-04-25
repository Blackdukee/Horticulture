<?php 


class loginContr extends Login{ 
    private $UserName;
    private $UserPassword;
    Private $UserEmail;
    Private $rememberme;
    
    private function __construct() {
    
    }
    public static function forLogin($UserName, $UserEmail, $UserPassword , $rememberme){
        $instance = new self();
        $instance->$UserName = $UserName;
        $instance->$UserEmail = $UserEmail;
        $instance->$UserPassword = $UserPassword;
        $instance->$rememberme = $rememberme;
        return $instance;
    }
    public static function forUpdatePassword(){
        $instance = new loginContr();
        return  $instance;
    }
    
    // login user to the system
    public function LoginUser(){
        if($this->emptyInput() !== false){
            header("Location: /Horticuture/login.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->UserName,$this->UserEmail, $this->UserPassword,$this->rememberme);
    }
    
    //check if the user password or name inputs are empty
    private function emptyInput(){
        $result = null;
        if(empty($this->UserName) || empty($this->UserPassword)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    
}