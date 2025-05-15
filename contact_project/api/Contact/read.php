<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET"); // Typically GET for reading a single resource

// Include files
require_once __DIR__ . 
'/../../controller/ContactController.php


'; // Adjusted path

// Instantiate ContactController
$contactController = new ContactController();

// Get ID from URL or request body
// For a GET request, ID is usually in the query string, e.g., read.php?id=1
$id = isset($_GET['id']) ? $_GET['id'] : die(); // Terminate if no ID is provided

if($id) {
    // Query message
    $result = $contactController->readOne($id);

    if($result["status"]) {
        if(isset($result["data"])){
            // Set response code - 200 OK
            http_response_code(200);
            // Show message data in json format
            echo json_encode($result["data"]);
        } else {
            // This case should ideally be handled by result["status"] false from controller
            http_response_code(404);
            echo json_encode(array("message" => "Message not found (controller indicated success but no data)."));
        }
    } else {
        // Set response code - 404 Not found
        http_response_code(404);
        // Tell the user message does not exist
        echo json_encode(
            array("message" => "Message not found. " . (isset($result["message"]) ? $result["message"] : ""))
        );
    }
} else {
    // Set response code - 400 bad request
    // This case is less likely to be hit due to die() above, but good for completeness
    http_response_code(400);
    echo json_encode(array("message" => "Unable to read message. ID is missing."));
}
?>
