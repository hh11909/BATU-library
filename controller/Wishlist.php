<?php 

namespace controller;

use model\WishlistItem;
use model\Book;

require_once (__DIR__ . "/../model/Wishlist.php");
require_once (__DIR__ . "/Crud.php");
require_once (__DIR__ . "/errors.php");
require_once (__DIR__ . "../model/Book.php");




function readwishlist ($student_id){
    $obj = new WishlistItem() ;
    $read = json_decode($obj->read(["student_ID"],[$student_id]),1);
    $count =(isset($read["data"]))?count($read["data"]):0;
    $book = new Book();
    $Books = [];
    for ($i=0;$i<=$count;$i++){
        $readbook = json_decode($book->read(["name"],[$read[$i]["name"]]),1);
        array_push($Books,$readbook);
    }
    return json_encode($Books) ;
}