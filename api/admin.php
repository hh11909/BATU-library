<?php

session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,PUT,DELETE");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
require_once(__DIR__ . "/../model/errors.php");
require_once(__DIR__ . "/../controller/Admin.php");

function getData(): array | null
{
  $headers = getallheaders();
  $contentType = $headers['Content-Type'];
  $data = file_get_contents('php://input');
  switch ($contentType) {
    case 'application/json':
      return json_decode($data, true);
    case 'application/x-www-form-urlencoded':
      parse_str($data, $data);
      return $data;
  }
  return null;
}
/*@var Admin $admin*/
$admin = unserialize($_SESSION['user']);
if (!$admin) {
  error422('Unauthorized', 401);
}

switch ($_SERVER["REQUEST_METHOD"]) {
  // Read
  case 'GET':
    $id = $_GET['id'];
    $admin->read($id);
    // Update
  case 'PUT':
    var_dump(unserialize($_SESSION['user']));
    $data = getData();
    if (!$data) {
      error422('Bad Request', 403);
    }
    $keys = array_keys($data);
    $vals = array_values($data);
    $admin->update($keys, $vals);
    break;
  // Delete
  case 'DELETE':
    $data = getData();
    if ($data['ids']) {
      $admin->delete($data['ids']);
    }
    $admin->delete($data['id']);
    break;
  default:
    error422("Method is not allowed");
}
