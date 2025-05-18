<?php

namespace controller;

use model\WishlistItem;
use model\Book;

require_once(__DIR__ . "/../model/Wishlist.php");
require_once(__DIR__ . "/../model/Crud.php");
require_once(__DIR__ . "/../model/errors.php");
require_once(__DIR__ . "/../model/Book.php");




function readwishlist($student_id)
{
  $obj = new WishlistItem();
  $read = json_decode($obj->read(["student_ID"], [$student_id]), 1);
  $book = new Book();
  $_books = [];
  foreach ($read['data'] as $_book) {
    $readbook = json_decode($book->read(['book_ID'], [$_book['book_ID']]), 1);
    array_push($_books, $readbook['data'][0]);
  }
  return json_encode([
    'status' => 200,
    'Message' => "Successfully read wishlist books",
    'data' => $_books
  ]);
}

