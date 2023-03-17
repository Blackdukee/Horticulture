<?php 
class Dbh {
    protected function connect(){ 
        try{
        $username = "root"; 
        $password = "2112002";
        $dbName = "black";
        $dbh = new PDO('mysql:host=localhost;dbname=black', $username, $password);
        return $dbh;
        
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
}