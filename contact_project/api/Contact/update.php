<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT"); // PUT is commonly used for update operations
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include files
require_once __DIR__ . 
'/../../controller/ContactController.php


'; // Adjusted path

// Instantiate ContactController
$contactController = new ContactController();

// Get ID from URL or request body
// For PUT, ID might be in the URL (e.g., update.php?id=1) or part of the JSON body.
// Let's assume it's in the query string for consistency with read.php and delete.php (to be created).
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Get posted data
$data = json_decode(file_get_contents("php://input"), true);

// Validate input data
if($id && $data !== null && (isset($data['name']) || isset($data['email']) || isset($data['message']) || array_key_exists('student_ID', $data) )) {
    // Basic validation for email if provided
    if (isset($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(array("message" => "Unable to update message. Invalid email format."));
        exit();
    }

    // Update the message
    $result = $contactController->update($id, $data);

    if($result["status"]) {
        // Set response code - 200 ok
        http_response_code(200);
        // Tell the user
        echo json_encode(array("message" => "Message was updated."));
    } else {
        // Set response code - 503 service unavailable or 404 if not found
        // The controller's update method should ideally distinguish these.
        // For now, we'll use a general error. If message is "Message could not be updated. It might not exist or data is unchanged.", 404 or 304 might be more appropriate.
        if (strpos($result["message"], "not exist") !== false) {
            http_response_code(404);
        } else if (strpos($result["message"], "No data provided") !== false) {
            http_response_code(400); // Bad request if no data was sent
        } else {
            http_response_code(503); // Service unavailable for other errors
        }
        // Tell the user
        echo json_encode(array("message" => "Unable to update message. " . (isset($result["message"]) ? $result["message"] : "")));
    }
} else {
    // Set response code - 400 bad request
    http_response_code(400);
    // Tell the user that data is incomplete or ID is missing
    $error_message = "Unable to update message.";
    if (!$id) {
        $error_message .= " ID is missing.";
    }
    if ($data === null || !(isset($data['name']) || isset($data['email']) || isset($data['message']) || array_key_exists('student_ID', $data) )) {
        $error_message .= " Data is incomplete or not provided.";
    }
    echo json_encode(array("message" => $error_message));
}
?>
