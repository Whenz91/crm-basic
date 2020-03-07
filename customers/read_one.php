<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/Database.php';
include_once '../objects/Customers.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare customer object
$customer = new Customers($db);
 
// set ID property of record to read
$customer->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of customer to be edited
$customer->readOne();
 
if($customer->customer_name!=null){
    // create array
    $customer_arr = array(
        "id" => $customer->id,
        "customer_name" => $customer->customer_name,
        "customer_post" => $customer->customer_post,
        "customer_phone" => $customer->customer_phone,
        "customer_email" => $customer->customer_email,
        "company_name" => $customer->company_name,
        "company_address" => $customer->company_address,
        "company_industry" => $customer->company_industry,
        "what_measure" => $customer->what_measure,
        "how_measure" => $customer->how_measure,
        "what_interested" => $customer->what_interested,
        "competitors_name" => $customer->competitors_name,
        "competitors_products" => $customer->competitors_products,
        "what_use" => $customer->what_use,
        "satisfaction" => $customer->satisfaction,
        "can_we_help" => $customer->can_we_help,
        "comment" => $customer->comment,
        "status" => $customer->status,
        "user_id" => $customer->user_id,
        "user_name" => $customer->user_name,
        "created_date" => $customer->created_date,
        "modified" => $customer->modified
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($customer_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "A felhasználó nem létezik."));
}

?>
