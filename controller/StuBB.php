<?php
namespace controller;
use model;
use model\BBooks;

require("../model/errors");
require("../model/Book");
//class BorrowedBook extends Book {
  //public $is_borrowed=1;

   //}
   trait StuBB{
    static function createStuBB($student_ID,$book_ID,$borrow_date,$return_date){
      Admin::subtractBook($student_ID);
      $bb =new BBooks;
      return $bb->create($student_ID,$book_ID,$borrow_date,$return_date);
    }
    static function readStuBB(){

    }
    static function deleteStuBB($student_ID,$book_ID){
      
      Admin::subtractBook($student_ID);
      $bb =new BBooks;
      return $bb->delete($student_ID,$book_ID);
    }

}
      

?>