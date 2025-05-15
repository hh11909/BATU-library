<?php

require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Admin.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../config.php');

use controller\Admin;
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
  $user = unserialize($_SESSION['user']);
  if ($user instanceof Admin || $user instanceof Friend) {
    $data = getData();

    /* @var User $user */
    if (!isset($_GET['id'])) {
      error422("Event ID is required");
      die();
    }
    $id = $_GET['id'];
    echo $user->updateEvent($data, $id);
  } else {
    error422("Unauthorized", 403);
    die();
  }
}
