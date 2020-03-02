<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/Database.php';
 
// instantiate customers object
include_once '../objects/Customers.php';
 
$database = new Database();
$db = $database->getConnection();
 
$customer = new Customers($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->name) &&
    !empty($data->post) &&
    !empty($data->phone) &&
    !empty($data->email) &&
    !empty($data->companyName) &&
    !empty($data->companyAddress)
) {
 
    // set customer property values
    $customer->customer_name = $data->name; 
    $customer->customer_post = $data->post; 
    $customer->customer_phone = $data->phone; 
    $customer->customer_email = $data->email; 
    $customer->company_name = $data->companyName; 
    $customer->company_address = $data->companyAddress; 
    $customer->company_industry = $data->industry; 
    $customer->what_measure = $data->whatMeasure; 
    $customer->how_measure = $data->howMeasure;
    $customer->what_interested = $data->whatInterested; 
    $customer->competitors_name = $data->competitorsName; 
    $customer->competitors_products = $data->competitorsProducts; 
    $customer->what_use = $data->whatUsed; 
    $customer->satisfaction = $data->satisfaction; 
    $customer->can_we_help = $data->canWeHelp; 
    $customer->comment = $data->comment; 
    $customer->status = $data->status; 
    $customer->user_id = $data->userId; 
    $customer->created_date = date('Y-m-d H:i:s');
 
    // create the customer
    if($customer->create()) {
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Új ügyfél felvéve a rendszerbe."));
    }
 
    // if unable to create the user, tell the user
    else {
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Nem sikerült az új ügyfél felvétele az adatbázisba."));
    }
}
 
// tell the user data is incomplete
else {
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Nem sikerült a felvétel. Tölts ki minden mezőt helyesen."));
}



?>