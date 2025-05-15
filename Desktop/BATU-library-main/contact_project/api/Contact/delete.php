<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE"); // DELETE method for delete operations
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include files
require_once __DIR__ . 
'/../../controller/ContactController.php


'; // Adjusted path

// Instantiate ContactController
$contactController = new ContactController();

// Get ID from URL or request body
// For DELETE, ID is usually in the query string, e.g., delete.php?id=1
// Or it could be in the request body if preferred, but query string is common for DELETE by ID.
$id = isset($_GET['id']) ? $_GET['id'] : null;

// If ID is not in query string, check if it's in JSON body (less common for DELETE by ID)
if (!$id) {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = isset($data['id']) ? $data['id'] : null;
}

// Validate ID
if($id) {
    // Delete the message
    $result = $contactController->delete($id);

    if($result["status"]) {
        // Set response code - 200 ok
        http_response_code(200);
        // Tell the user
        echo json_encode(array("message" => "Message was deleted."));
    } else {
        // Set response code - 503 service unavailable or 404 if not found
        // The controller's delete method should ideally distinguish these.
        if (strpos($result["message"], "not exist") !== false) {
            http_response_code(404);
        } else {
            http_response_code(503); // Service unavailable for other errors
        }
        // Tell the user
        echo json_encode(array("message" => "Unable to delete message. " . (isset($result["message"]) ? $result["message"] : "")));
    }
} else {
    // Set response code - 400 bad request
    http_response_code(400);
    // Tell the user that ID is missing
    echo json_encode(array("message" => "Unable to delete message. ID is missing."));
}
?>
