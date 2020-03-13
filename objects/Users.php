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
        $query = "INSERT INTO " . $this->table_name . "
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

    // delete the user
    function delete() {
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()) {
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

    // used when filling up the update user form
    function readOne() {
    
        // query to read single record
        $query = "SELECT * FROM " . $this->table_name . "
                  WHERE id = ? LIMIT 0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->phone = $row['phone'];
        $this->location = $row['location'];
        $this->rank = $row['rank'];
    }

    // update the user profile
    function update() {
    
        // if password needs to be updated
        $password_set = !empty($this->password) ? ", password = :password" : "";

        // update query
        $query = "UPDATE " . $this->table_name . "
                SET
                    name = :name,
                    location = :location,
                    phone = :phone,
                    email = :email,
                    rank = :rank
                    {$password_set}
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->rank = htmlspecialchars(strip_tags($this->rank));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':rank', $this->rank);

        // hash the password before saving to database
        if(!empty($this->password)){
            $this->password = htmlspecialchars(strip_tags($this->password));
            $password_hash = md5($this->password);
            $stmt->bindParam(':password', $password_hash);
        }

        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }


}


?>