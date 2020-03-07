<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/Database.php';
include_once '../objects/Customers.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare customers object
$customer = new Customers($db);
 
// get id of customer to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of customer to be edited
$customer->id = $data->id;
 
// set customer property values
$customer->customer_name = $data->customer_name; 
$customer->customer_post = $data->customer_post; 
$customer->customer_phone = $data->customer_phone; 
$customer->customer_email = $data->customer_email; 
$customer->company_name = $data->company_name; 
$customer->company_address = $data->company_address; 
$customer->company_industry = $data->company_industry; 
$customer->what_measure = $data->what_measure; 
$customer->how_measure = $data->how_measure;
$customer->what_interested = $data->what_interested; 
$customer->competitors_name = $data->competitors_name; 
$customer->competitors_products = $data->competitors_products; 
$customer->what_use = $data->what_use; 
$customer->satisfaction = $data->satisfaction; 
$customer->can_we_help = $data->can_we_help; 
$customer->comment = $data->comment; 
$customer->status = $data->status;
 
// update the customer
if($customer->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Adatok sikeresen módosítva."));
}
 
// if unable to update the user, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Nem sikerült az adatokat módosítani."));
}
?>