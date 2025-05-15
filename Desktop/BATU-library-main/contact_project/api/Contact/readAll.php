<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Include files
require_once __DIR__ . 
'/../../controller/ContactController.php


'; // Adjusted path

// Instantiate ContactController
$contactController = new ContactController();

// Query messages
$result = $contactController->readAll();

if($result["status"]) {
    if(isset($result["data"]["records"]) && count($result["data"]["records"]) > 0){
        // Set response code - 200 OK
        http_response_code(200);
        // Show messages data in json format
        echo json_encode($result["data"]);
    } else {
        // Set response code - 404 Not found
        http_response_code(404);
        // Tell the user no messages found
        echo json_encode(
            array("message" => "No messages found.")
        );
    }
} else {
    // Set response code - 503 service unavailable
    // This case might not be directly hit if readAll always returns a status, 
    // but good for robustness if the controller method itself could fail before checking rowCount.
    http_response_code(503);
    echo json_encode(array("message" => "Unable to retrieve messages. " . (isset($result["message"]) ? $result["message"] : "")));
}
?>
