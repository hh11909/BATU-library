<?php
namespace controller;
use model;
require("../model/errors");
require("../model/Book");
class BorrowedBook extends Book {
  public $is_borrowed=1;

   }
   trait StuBB{
    static function readBBooks($academy_number){
      $bookModel = new model\BBooks();
      $result = $bookModel->read($academy_number );
    return $result;
  }
}
      

?>