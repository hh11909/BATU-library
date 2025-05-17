<?php

session_start();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once(__DIR__ . '/../../model/errors.php');
require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../model/likes.php'); 
// require_once(__DIR__ . '/../../controller/likes.php'); (it' code is in the model/likes)

use model\like; 

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    echo error422('Only DELETE method is allowed', 405);
    die();
}

if (!isset($_SESSION['user'])) {
    echo error422("Unauthorized: Please login first", 401);
    die();
}

$user = unserialize($_SESSION['user']);
$studentId = $user->id ?? null; 
$bookName = $_POST['name'] ?? null;

if (empty($studentId) || empty($bookName)) {
    echo error422("Student ID and Book Name are required", 400);
    die();
}

$like = new like();
$result = $like->delete(['student_ID', 'book_name'], [$studentId, $bookName]);

echo $result;
die();




