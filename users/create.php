<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/Database.php';
 
// instantiate user object
include_once '../objects/Users.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new Users($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->name) &&
    !empty($data->email) &&
    !empty($data->phone) &&
    !empty($data->location) &&
    !empty($data->password) &&
    !empty($data->userRank)
){
 
    // set user property values
    $user->name = $data->name;
    $user->email = $data->email;
    $user->phone = $data->phone;
    $user->location = $data->location;
    $user->password = $data->password;
    $user->rank = $data->userRank;
 
    // create the user
    if($user->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Új munkatárs felvéve a rendszerbe."));
    }
 
    // if unable to create the user, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Nem sikerült az új munkatárs felvétele az adatbázisba."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Nem sikerült a felvétel. Tölts ki minden mezőt helyesen."));
}



?>