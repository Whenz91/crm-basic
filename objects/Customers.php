<?php

class Customers {
 
    // database connection and table name
    private $conn;
    private $table_name = "customers";
 
    // object properties
    public $id;
    public $customer_name;
    public $customer_post;
    public $customer_phone;
    public $customer_email;
    public $company_name;
    public $company_address;
    public $company_industry;
    public $what_measure;
    public $how_measure;
    public $what_interested;
    public $competitors_name;
    public $competitors_products;
    public $what_use;
    public $satisfaction;
    public $can_we_help;
    public $comment;
    public $status;
    public $user_id;
    public $created_date;
    public $modified;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create new customer
    function create() {
    
        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "
                SET 
                    customer_name=:customer_name, 
                    customer_post=:customer_post, 
                    customer_phone=:customer_phone, 
                    customer_email=:customer_email, 
                    company_name=:company_name, 
                    company_address=:company_address, 
                    company_industry=:company_industry, 
                    what_measure=:what_measure, 
                    how_measure=:how_measure, 
                    what_interested=:what_interested, 
                    competitors_name=:competitors_name, 
                    competitors_products=:competitors_products, 
                    what_use=:what_use, 
                    satisfaction=:satisfaction, 
                    can_we_help=:can_we_help, 
                    comment=:comment, 
                    status=:status, 
                    user_id=:user_id, 
                    created_date=:created_date";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->customer_name = htmlspecialchars(strip_tags($this->customer_name));
        $this->customer_post = htmlspecialchars(strip_tags($this->customer_post));
        $this->customer_phone = htmlspecialchars(strip_tags($this->customer_phone));
        $this->customer_email = htmlspecialchars(strip_tags($this->customer_email));
        $this->company_name = htmlspecialchars(strip_tags($this->company_name));
        $this->company_address = htmlspecialchars(strip_tags($this->company_address));
        $this->company_industry = htmlspecialchars(strip_tags($this->company_industry));
        $this->what_measure = htmlspecialchars(strip_tags($this->what_measure));
        $this->how_measure = htmlspecialchars(strip_tags($this->how_measure));
        $this->what_interested = htmlspecialchars(strip_tags($this->what_interested));
        $this->competitors_name = htmlspecialchars(strip_tags($this->competitors_name));
        $this->competitors_products = htmlspecialchars(strip_tags($this->competitors_products));
        $this->what_use = htmlspecialchars(strip_tags($this->what_use));
        $this->satisfaction = htmlspecialchars(strip_tags($this->satisfaction));
        $this->can_we_help = htmlspecialchars(strip_tags($this->can_we_help));
        $this->comment = htmlspecialchars(strip_tags($this->comment));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->created_date = htmlspecialchars(strip_tags($this->created_date));
        
    
        // bind values
        $stmt->bindParam(":customer_name", $this->customer_name);
        $stmt->bindParam(":customer_post", $this->customer_post);
        $stmt->bindParam(":customer_phone", $this->customer_phone);
        $stmt->bindParam(":customer_email", $this->customer_email);
        $stmt->bindParam(":company_name", $this->company_name);
        $stmt->bindParam(":company_address", $this->company_address);
        $stmt->bindParam(":company_industry", $this->company_industry);
        $stmt->bindParam(":what_measure", $this->what_measure);
        $stmt->bindParam(":how_measure", $this->how_measure);
        $stmt->bindParam(":what_interested", $this->what_interested);
        $stmt->bindParam(":competitors_name", $this->competitors_name);
        $stmt->bindParam(":competitors_products", $this->competitors_products);
        $stmt->bindParam(":what_use", $this->what_use);
        $stmt->bindParam(":satisfaction", $this->satisfaction);
        $stmt->bindParam(":can_we_help", $this->can_we_help);
        $stmt->bindParam(":comment", $this->comment);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":created_date", $this->created_date);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

    // read all customers data
    function read() {
    
        // select all query
        $query = "SELECT 
                    id, 
                    customer_name, 
                    customer_post, 
                    customer_phone, 
                    customer_email, 
                    company_name, 
                    company_address, 
                    company_industry, 
                    status FROM " . $this->table_name;
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
}

?>