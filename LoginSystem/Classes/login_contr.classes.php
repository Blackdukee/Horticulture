<?php 


class loginContr extends Login{ 
    private $UserName;
    private $UserPassword;
    Private $UserEmail;
    Private $rememberme;
    
    public function __construct($UserName, $UserEmail, $UserPassword , $rememberme) {
        $this->UserName = $UserName;
        $this->UserEmail = $UserEmail;
        $this->UserPassword = $UserPassword;
        $this->rememberme = $rememberme;
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