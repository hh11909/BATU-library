<?php

require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Admin.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../../controller/Event.php');

use controller\Admin;
use controller\Event;
use controller\Friend;

session_start();
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "DELETE") {
    if (!isset($_SESSION['user'])) {
        http_response_code(403);
        echo json_encode(['status' => 403, 'message' => 'Log in Please']);
        die();
    }

    /* @var User $user */
    $user = unserialize($_SESSION['user']);
    $_DELETE = json_decode(file_get_contents("php://input"), true);


    if (!isset($_DELETE['event_ID']) || !is_array($_DELETE['event_ID'])) {
        http_response_code(422);
        echo json_encode(['status' => 422, 'message' => 'event_ID must be an array']);
        die();
    }

    $results = [];

   foreach ($_DELETE['event_ID'] as $event_ID) {
    $response = null;

    if ($user instanceof Admin) {
        $response = $user->deleteEvent(['event_ID' => $event_ID]);
    } elseif ($user instanceof Friend) {
        $response = $user->delete($event_ID, $user->id);
    } else {
        $results[] = [
            'event_ID' => $event_ID,
            'status' => 403,
            'message' => 'Unauthorized user role'
        ];
        continue;
    }

    if ($response !== null && is_string($response)) {
        $results[] = json_decode($response, true);
    } else {
        $results[] = [
            'event_ID' => $event_ID,
            'status' => 500,
            'message' => 'Deletion failed or invalid response'
        ];
    }
}


    echo json_encode($results);
}
