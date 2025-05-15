<?php

session_start();
require_once(__DIR__ . "/../../controller/Admin.php");
require_once(__DIR__ . "/../../model/errors.php");
require_once(__DIR__ . "/../config.php");

use controller\Admin;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type,Authorization,X-Request-With");

/**@var Admin $admin*/
$admin = unserialize($_SESSION['user']);
if (!$admin || !isset($_SESSION['user'])) {
  error422("Login please", 302);
  header("Location: /pages/login.php");
  die();
}
if ($admin->role !== 'admin') {
  error422("Unauthorized", 401);
  die();
}

$data = getData();
$admin->read($data['id']);
