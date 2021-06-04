<?php
    class Database{
      
        // database credentials
        private $host = "sql300.main-hosting.eu";
        private $db_name = "u931565432_pcadmin";
        private $username = "u931565432_pcroot";
        private $password = "Admin@vam5";
        
        public $conn;
      
        public function getConnection(){
            
            date_default_timezone_set('Asia/Kolkata'); 

            $this->conn = null;
      
            try{
                $this->conn = 
                    new PDO("mysql:host=" . $this->host . 
                            ";dbname=" . $this->db_name, 
                            $this->username, 
                            $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
            
            return $this->conn;
        }// public function getConnection()
    }// class Database
?>