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
    header('Location: /pages/login.php');
    error422('Log in Please', 403);
    die();
  }

  /* @var User $user */
  $user = unserialize($_SESSION['user']);
  parse_str(file_get_contents("php://input"), $_DELETE);

  if (!isset($_DELETE['event_ID'])) {
    error422("Event ID is required");
    die();
  }

  $event_ID = $_DELETE['event_ID'];
  
  if ($user instanceof Admin) {
    echo $user->deleteEvent($event_ID);
  } elseif ($user instanceof Friend) {
    echo $user->delete($event_ID, $user->id);
  } else {
    error422("Unauthorized user role.");
    die();
  }
}
?>
