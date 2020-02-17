<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once "../config/Database.php";
include_once "../objects/Users.php";
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user = new Users($db);

// query users
$stmt = $user->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0) {
 
    // users array
    $users_arr=array();
    $users_arr["records"] = array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $user_item = array(
            "id" => $id,
            "name" => $name,
            "password" => $password,
            "location" => $location,
            "phone" => $phone,
            "email" => $email,
            "rank" => $rank
        );
 
        array_push($users_arr["records"], $user_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show users data in json format
    echo json_encode($users_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no users found
    echo json_encode(
        array("message" => "Nincsenek munkatársak az adatbázisban.")
    );
}