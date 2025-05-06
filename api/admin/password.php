<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:PATCH");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");

require_once(__DIR__ . "/../../controller/Admin.php");
require_once(__DIR__ . "/../../model/errors.php");

use controller\Admin;

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



if (!isset($_SESSION)) {
  session_start();
}
/**@var Admin $user*/
$user = unserialize($_SESSION['user']);
switch ($_SERVER['REQUEST_METHOD']) {
  case 'PATCH':
    $data = getData();
    if (!$data) {
      error422("Provide data");
    }
    $user->updatePassword($data['password']);
    break;
  default:
    error422("Use PATCH to update");
}
