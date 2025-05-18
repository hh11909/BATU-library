<?php

session_start();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once(__DIR__ . '/../../model/errors.php');
require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../model/Likes.php');
// require_once(__DIR__ . '/../../controller/likes.php'); (it's code is in the model/likes)
require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Student.php');
require_once(__DIR__ . '/../../controller/Friend.php');

use model\like;
use controller\Friend;
use controller\Student;
use controller\User;

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $_SERVER['REQUEST_METHOD'] !== 'GET') {
  echo error422('Only POST method is allowed', 405);
  die();
}

if (!isset($_SESSION['user'])) {
  echo error422("Unauthorized: Please login first", 401);
  die();
}

$user = unserialize($_SESSION['user']);
if (!$user) {
  error422('Unauthorized', 401);
  die();
}
$studentId = $user->id;

$bookId = $_GET['id'] ?? ($_POST['id'] ?? null);

if (empty($studentId) || empty($bookId)) {
  echo error422("Student ID and Book Name are required", 400);
  die();
}

$likes = new like();
$result = $likes->create($studentId, $bookId);

echo $result;
die();
