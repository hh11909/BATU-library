<?php

session_start();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once(__DIR__ . '/../../model/errors.php');
require_once(__DIR__ . '/../../controller/Student.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Wishlist.php');
require_once(__DIR__ . '/../../model/Wishlist.php');

use controller\Admin;
use controller\Student;
use controller\Friend;
use model\WishlistItem;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo error422('Only POST method is allowed', 405);
  die();
}

$bookId = $_GET['id'] ?? $_POST['id'] ?? null;

if (empty($bookId)) {
  echo error422("Book name not found", 400);
  die();
}

if (!isset($_SESSION['user'])) {
  echo error422("Unauthorized: Please login first", 401);
  die();
}
/**@var Admin | Student $user*/
$user = unserialize($_SESSION['user']);

if (!$user) {
  error422('Unauthorized', 401);
  die();
}


if ($user instanceof Admin) {
  echo error422("Admins cannot create wishlists", 403);
  die();
}

$wishlist = new WishlistItem();
try {
  $bookId = intval($bookId);
} catch (Exception $e) {
  error422("Id must be a number", 400);
}

echo $user->addItemToWishlist($bookId);


die();

