<?php 

class Dbconnect {
    private static $instance;
    private $connection;

    private function __construct() {
        // Set up the database connection here
        $host = 'localhost';
        $username = 'brilliant';
        $password = '2112002';
        $database = 'horticulture';

        $this->connection = new mysqli($host, $username, $password, $database);

        // Check if connection error occurred
        if ($this->connection->connect_error) {
            die('Connection failed: ' . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
    public function closeConnection(){
        $this->connection->close();
    }
    
    public function fetchData(){
        $result = mysqli_query($this->connection,"SELECT distinct product_type FROM `product`");
        if($result){
            return $result;
        }
        else{
            echo 'Query error: ' . mysqli_error($this->connection);
        }
    }
    
    
}
