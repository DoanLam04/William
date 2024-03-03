<?php
    class Database{
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'william';

        public $conn;

        function __construct(){
            $this->conn = new   mysqli($this->host, $this->username,$this->password,$this->dbname);

            if($this->conn->connect_error){
                die("connection failed: ". $this->conn->connect_error);
                //echo"connection failed!";
            }
            // else{
            //     echo "connection successfully!";
            // }     
            
            try {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage());
            }
        }

        
    }

?>