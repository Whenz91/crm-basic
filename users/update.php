<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/Database.php';
include_once '../objects/Users.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare users object
$user = new Users($db);
 
// get id of user to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of user to be edited
$user->id = $data->id;
 
// set user property values
$user->name = $data->name;
$user->email = $data->email;
$user->phone = $data->phone;
$user->location = $data->location;
if($data->password !== "") {
    $user->password = $data->password;
}
$user->rank = $data->rank;
 
// update the user
if($user->update()){
 
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