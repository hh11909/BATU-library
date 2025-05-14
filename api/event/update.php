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
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "PUT") {
  if (!isset($_SESSION['user'])) {
    header('Location: /pages/login.php');
    error422('Log in Please', 403);
    die();
  }

  /* @var User $user */
  $user = unserialize($_SESSION['user']);
  
  if (!isset($_POST['event_ID'])) {
    error422("Event ID is required");
    die();
  }
  
  if (!isset($_POST['title']) || !isset($_POST['content']) || !isset($_POST['start_date']) || !isset($_POST['end_date'])) {
    error422("All fields are required for event update");
    die();
  }

  $event_ID = $_POST['event_ID'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $state = $_POST['state'] ?? 'requested'; // If state is not provided, default to 'requested'

  $event = new Event($title, $content, $start_date, $end_date, null); // Create an event object with the new values
  
  if ($user instanceof Admin) {
    // Admin can update any event
    echo $user->updateEvent($event_ID, $title, $content, $start_date, $end_date, $state);
  
}
}
?>
