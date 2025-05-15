<?php

session_start();
require_once(__DIR__ . "/../../controller/Admin.php");
require_once(__DIR__ . "/../../model/errors.php");
require_once(__DIR__ . "/../../config.php");

use controller\Admin;

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");

/**@var Admin $admin*/
$admin = unserialize($_SESSION['user']);
if (!$admin) {
  error422("Unauthorized", 401);
}

$data = getData();

if (count($data)) {
  $admin->delete($data['ids']);
} else {
  $admin->delete($data['id']);
}
die();
