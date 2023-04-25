<?php 

class UpdateDataContr extends UpdateData {
    public function updateDataContr($name, $address, $phone, $img, $email){
        if($this->emptyInput($name, $address, $phone, $img, $email) !== false){
            header("Location: /Horticulture/LoginSystem/Classes/updateData.classes.php?error=emptyinput");
            exit();
        }
       
        $this->updateData($name, $address, $phone, $img, $email);
        
    }
    

    
    
    private function emptyInput($name, $address, $phone, $img2, $email){
        $name = trim($name);
        $address = trim($address);
        $phone = trim($phone);
        $email = trim($email);
        $result = null;
        if(empty($name) || empty($address) || empty($phone) || empty($img2) || empty($email)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    
}