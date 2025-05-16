<?php
session_start();
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

require_once(__DIR__ . "/../../controller/Admin.php");

use controller\Admin;

// Authorization

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  if (isset($_SESSION['user'])) {
    /**@var User $user*/
    $user = unserialize($_SESSION['user']);
    if (!($user instanceof Admin)) {
      error422('Unauthorized', 401);
      die();
    }
    if ($id) {
      try {
        $id = intval($id);
      } catch (Exception $e) {
        error422("Bad Request", 400);
      }
    }
    echo $user->deleteMessage($id);
  } else {
    error422('Unauthorized', 401);
    die();
  }
}
error422('Bad Request', 400);
