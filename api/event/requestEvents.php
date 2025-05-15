<?php

require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Admin.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../../controller/Event.php');
require_once(__DIR__ . '/../../model/Event.php');


use controller\Friend;
use model\Event as EventModel;

session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Request-With");

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod === "GET") {
  if (!isset($_SESSION['user'])) {
    header('Location: /pages/login.php');
    error422("Log in Please", 403);
    die();
  }

  $user = unserialize($_SESSION['user']);

  if ($user instanceof Friend) {
    $eventModel = new EventModel();
    $studentEvents = $eventModel->read(["student_ID"], [$user->id]);

    if (!is_array($studentEvents)) {
      echo json_encode(["error" => "No events found."]);
      exit;
    }
    $filtered = array_filter($studentEvents, function ($e) {
      return empty($e['admin_ID']);
    });

    echo json_encode(array_values($filtered));
  } else {
    error422("Only students can view their requested events.");
    die();
  }
}
