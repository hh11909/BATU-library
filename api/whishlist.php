<?php

require_once(__DIR__ . '/../controller/Wishlist.php');
require_once(__DIR__ . '/../model/Wishlist.php');
require_once(__DIR__ . '/../model/Book.php');
require_once(__DIR__ . '/../controller/errors.php');


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Methods: GET, POST, DELETE");
    header("Access-Control-Allow-Headers: Content-Type");
    exit(0);
}

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

use model\WishlistItem;

switch ($method) {
    case 'GET':
        if (isset($_GET['student_ID'])) {
            $studentId = $_GET['student_ID'];
            echo \controller\readwishlist($studentId);
        } else {
            echo error422("Missing required parameter: student_ID");
        }
        break;

    case 'POST':
        if (isset($input['student_ID']) && isset($input['book_name'])) {
            $wishlist = new WishlistItem();
            echo $wishlist->create($input['student_ID'], $input['book_name']);
        } else {
            echo error422("Missing student_ID or book_name in request body");
        }
        break;

    case 'DELETE':
        if (isset($input['student_ID']) && isset($input['book_name'])) {
            $wishlist = new WishlistItem();
            echo $wishlist->delete(['student_ID', 'book_name'], [$input['student_ID'], $input['book_name']]);
        } else {
            echo error422("Missing student_ID or book_name for deletion");
        }
        break;

    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
