<?php 


class loginContr extends Login{ 
    private $UserName;
    private $UserPassword;
    Private $UserEmail;
    
    public function __construct($UserName, $UserEmail, $UserPassword) {
        $this->UserName = $UserName;
        $this->UserEmail = $UserEmail;
        $this->UserPassword = $UserPassword;
    }
    
    public function LoginUser(){
        if($this->emptyInput() !== false){
            header("Location: ../login.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->UserName,$this->UserEmail, $this->UserPassword);
    }
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