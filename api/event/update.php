<?php

require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Admin.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../../controller/Event.php');

use controller\Admin;
use controller\Event;
use controller\Friend;

session_start();

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Request-With");

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "PUT") {
    if (!isset($_SESSION['user'])) {
        header('Location: /pages/login.php');
        error422('Log in Please', 403);
        die();
    }

    
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['event_ID'])) {
        error422("Event ID is required");
        die();
    }

    if (
        !isset($input['title']) || 
        !isset($input['content']) || 
        !isset($input['start_date']) || 
        !isset($input['end_date'])
    ) {
        error422("All fields are required for event update");
        die();
    }

    $event_ID = $input['event_ID'];
    $title = $input['title'];
    $content = $input['content'];
    $start_date = $input['start_date'];
    $end_date = $input['end_date'];
    $state = $input['state'] ?? 'requested';

    /* @var User $user */
    $user = unserialize($_SESSION['user']);

  
    $values = [
        'title' => $title,
        'content' => $content,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'state' => $state
    ];
    $filter = [
        'event_ID' => $event_ID
    ];

    if ($user instanceof Admin) {
        echo $user->updateEvent($values, $filter);
    } else {
        error422("Unauthorized user");
        die();
    }
}
