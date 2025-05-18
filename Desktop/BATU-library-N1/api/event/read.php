<?php

require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Admin.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../../controller/Event.php');
require_once(__DIR__ . '/../../model/Event.php');

use controller\Admin;
use controller\Friend;

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
    $arr = explode(',', $_GET['id']);
    if (count($arr) != 1) {
      array_map(function ($e) {
        return intval($e);
      }, $arr);
    } else {
      $arr = intval($arr[0]);
    }

    $result = $user->readEvent($arr);
    $result = json_decode($result, true);
    if ($result['status'] != 200) {
      echo json_encode($result);
      die();
    }

    echo json_encode($result);
  } else {
    error422("Unauthorized user.");
    die();
  }
}
