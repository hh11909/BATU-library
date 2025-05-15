<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include files
require_once __DIR__ . 
'/../../controller/ContactController.php


'; // Adjusted path

// Instantiate ContactController
$contactController = new ContactController();

// Get posted data
// Make sure that the data is coming in JSON format
$data = json_decode(file_get_contents("php://input"), true);

// Validate input data (basic validation)
if(
    !empty($data["name"]) &&
    !empty($data["email"]) &&
    !empty($data["message"]) &&
    filter_var($data["email"], FILTER_VALIDATE_EMAIL)
) {
    // student_ID is optional
    $message_data = [
        "name" => $data["name"],
        "email" => $data["email"],
        "message" => $data["message"],
        "student_ID" => isset($data["student_ID"]) ? $data["student_ID"] : null
    ];

    // Create the message
    $result = $contactController->create($message_data);

    if($result["status"]) {
        // Set response code - 201 created
        http_response_code(201);
        // Tell the user
        echo json_encode(array("message" => "Message was created.", "contact_id" => $result["contact_id"]));
    } else {
        // Set response code - 503 service unavailable
        http_response_code(503);
        // Tell the user
        echo json_encode(array("message" => "Unable to create message. " . (isset($result["message"]) ? $result["message"] : "")));
    }
} else {
    // Set response code - 400 bad request
    http_response_code(400);
    // Tell the user that data is incomplete or invalid
    echo json_encode(array("message" => "Unable to create message. Data is incomplete or email is invalid."));
}
?>
