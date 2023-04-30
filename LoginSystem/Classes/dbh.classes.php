<?php 
class Dbh {
    protected function connect(){ 
        try{
        $username = "brilliant"; 
        $password = "2112002";
        $dbName = "horticulture";
        $dbh = new PDO('mysql:host=localhost;dbname=horticulture', $username, $password);
        return $dbh;
        
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
    
    public function showFavArticles($id){
        $dbh = $this->connect();
        $sql = "SELECT * FROM `articles` WHERE `article_id` in (SELECT `article_id` FROM `favorites` WHERE `users_id` = ?)";
        $stmt = $dbh->prepare($sql);
        
        if($stmt->execute([$id])){
            $result = $stmt->fetchAll();
            return $result;
        }else{
            echo "Error: " . $sql . "<br>" ;
        }
        
    }
    
}