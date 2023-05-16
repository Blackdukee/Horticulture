<?php 
class Dbh {
    protected function connect(){ 
        try{
        $username = "brilliant"; 
        $password = "2112002";
        $dbName = "horticulture";
        // $dbh = new PDO('mysql:host=localhost;dbname=horticulture', $username, $password);
        $dbh = new mysqli('localhost', $username, $password, $dbName);
        return $dbh;
        
        }catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
    
    public function showFavArticles($id){
            
        $query = mysqli_query($this->connect(), "SELECT * FROM articles WHERE users_id = '$id'");
        
        return $query;
    
        
    }
    
}