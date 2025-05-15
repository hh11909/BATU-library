<?php

require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Admin.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../../controller/Event.php');
require_once(__DIR__ . '/../../model/Event.php');

use controller\Admin;
use controller\Friend;
use model\Event;

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

  if ($user instanceof Admin || $user instanceof Friend) {
    
    $allEventsJson = $user->readallevent();

  
    $allEventsData = json_decode($allEventsJson, true);

    if ($allEventsData === null) {
      echo json_encode(["error" => "Failed to decode events JSON"]);
      exit;
    }

   
    if (!isset($allEventsData['data']) || !is_array($allEventsData['data']) || empty($allEventsData['data'])) {
      echo json_encode(["error" => "No events found."]);
      exit;
    }

    
    $allEvents = $allEventsData['data'];

 
    $filtered = array_filter($allEvents, function ($e) {
      return !empty($e['admin_ID']);
    });

   
    echo json_encode(array_values($filtered));
  } else {
    error422("Unauthorized user.");
    die();
  }
}
