<?php

session_start();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once(__DIR__ . '/../../model/errors.php');
require_once(__DIR__ . '/../../controller/Student.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../../controller/User.php');
require_once(__DIR__ . '/../../controller/Wishlist.php');
require_once(__DIR__ . '/../../model/Wishlist.php');

use controller\Admin;
use model\WishlistItem;

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    echo error422('Only DELETE method is allowed', 405);
    die();
}

$wishlistbookname = $_GET['name'] ?? $_POST['name'] ?? null;

if (empty($wishlistbookname)) {
    echo error422("Wishlist item ID not found", 400);
    die();
}

if (!isset($_SESSION['user'])) {
    echo error422("Unauthorized: Please login first", 401);
    die();
}

$user = unserialize($_SESSION['user']);

if ($user instanceof Admin) {
    echo error422("Admins cannot delete wishlist items", 403);
    die();
}
$studentId = $user->id ?? null;

if (!$studentId) {
    echo error422("Student ID is missing", 400);
    die();
}

$wishlist = new WishlistItem();
$result = $wishlist->delete(["student_ID", "book_name"], [$studentId,$wishlistbookname]);

echo $result;
die();