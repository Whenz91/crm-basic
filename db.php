<?php 
class Db {
    public $conn;
    public $servername = "localhost";
    public $username = "root";
    public $dbname = "hanna_crm";
    public $password = "";

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully"; 
            return $this->conn;
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

}

?>