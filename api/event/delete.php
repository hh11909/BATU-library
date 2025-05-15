<?php

require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Admin.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../config.php');

use controller\Admin;
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
  if ($user instanceof Admin || $user instanceof Friend) {

    $id = $_GET['id'];

    if (!$id) {
      error422("Event ID is required");
      die();
    }

    echo $user->deleteEvent($id);
  } else {
    error422("Unauthorized", 403);
  }
}
