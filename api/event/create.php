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

if ($requestMethod == "POST") {
  if (!isset($_SESSION['user'])) {
    header('Location: /pages/login.php');
    error422('Log in Please', 403);
    die();
  }
  /*@var User $user*/
  $user = unserialize($_SESSION['user']);
  $event = new Event(
    $_POST['title'],
    $_POST['content'],
    $_POST['start_date'],
    $_POST['end_date'],
    $_POST['image'],
  );
  if ($user instanceof Admin) {
    $event->setAdmin_ID($user->id);
    echo $user->createEvent($event);
    ;
  }
  if ($user instanceof Friend) {
    $event->student_ID = $user->id;
    echo $user->createEvent($event);
  }
}
