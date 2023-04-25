<?php 
class Dbh {
    protected function connect(){ 
        try{
        $username = "root"; 
        $password = "2112002";
        $dbName = "horticulturedb";
        $dbh = new PDO('mysql:host=localhost;dbname=horticulturedb', $username, $password);
        return $dbh;
        
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
    
    
}