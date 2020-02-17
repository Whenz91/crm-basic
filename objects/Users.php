<?php

class Users {
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $name;
    public $password;
    public $location;
    public $phone;
    public $email;
    public $rank;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create new user
    function create() {
    
        // query to insert record
        $query = "INSERT INTO" . $this->table_name . "
                SET name=:name, password=:password, location=:location, phone=:phone, email=:email, rank=:rank";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->rank = $this->rank;

        $this->password = md5($this->password);
    
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":rank", $this->rank);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }


    // read login user data
    function login($email) {

        // select user
        $query = "SELECT * FROM users WHERE email= :email";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind email of user to be login
        $stmt->bindParam(':email', $email);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // set values to object properties
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->password = $row['password'];
        $this->rank = $row['rank'];
    }

    // read users
    function read() {
    
        // select all query
        $query = "SELECT * FROM " . $this->table_name;
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }


}


?>