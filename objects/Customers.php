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
    public $user_name;
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

    // used when filling up the update customer form
    function readOne() {
    
        // query to read single record
        $query = "SELECT 
                    u.name as user_name, 
                    c.id, c.customer_name, 
                    c.customer_post, 
                    c.customer_phone, 
                    c.customer_email, 
                    c.company_name, 
                    c.company_address, 
                    c.company_industry, 
                    c.what_measure, 
                    c.how_measure, 
                    c.what_interested, 
                    c.competitors_name, 
                    c.competitors_products, 
                    c.what_use, 
                    c.satisfaction, 
                    c.can_we_help, 
                    c.comment, 
                    c.status, 
                    c.user_id, 
                    c.created_date,
                    c.modified  
                    FROM " . $this->table_name . " c LEFT JOIN users u ON c.user_id = u.id
                  WHERE c.id = ? LIMIT 0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id = $row["id"];
        $this->customer_name = $row["customer_name"];
        $this->customer_post = $row["customer_post"];
        $this->customer_phone = $row["customer_phone"];
        $this->customer_email = $row["customer_email"];
        $this->company_name = $row["company_name"];
        $this->company_address = $row["company_address"];
        $this->company_industry = $row["company_industry"];
        $this->what_measure = $row["what_measure"];
        $this->how_measure = $row["how_measure"];
        $this->what_interested = $row["what_interested"];
        $this->competitors_name = $row["competitors_name"];
        $this->competitors_products = $row["competitors_products"];
        $this->what_use = $row["what_use"];
        $this->satisfaction = $row["satisfaction"];
        $this->can_we_help = $row["can_we_help"];
        $this->comment = $row["comment"];
        $this->status = $row["status"];
        $this->user_id = $row["user_id"];
        $this->user_name = $row["user_name"];
        $this->created_date = $row["created_date"];
        $this->modified = $row["modified"];
    }

     // update the customer profile
     function update() {
    
        // update query
        $query = "UPDATE " . $this->table_name . "
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
                    status=:status 
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));
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

        // bind new values
        $stmt->bindParam(":id", $this->id);
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
        $stmt->bindParam(":status", $this->status);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

}

?>