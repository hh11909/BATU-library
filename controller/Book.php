<?php

namespace controller;

use model;

require("../model/errors");
require("../model/Book");
require("Images.php");
class Book
{
  public $book_ID;
  public $name;
  public $author;
  public $image;
  public $is_borrowed = 0;
  public $description;
  public $created_at;
  public $updated_at;
  private $admin_ID;

  function __construct($book_ID, $name, $author, $image, $description, $is_borrowed, $admin_ID, $created_at, $updated_at)
  {
    $this->book_ID = $book_ID;
    $this->name = $name;
    $this->author = $author;
    $this->image = $image;
    $this->description = $description;
    $this->is_borrowed = $is_borrowed;
    $this->admin_ID = $admin_ID;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
  }
  function setAdmin_ID($admin_ID)
  {
    $this->admin_ID = $admin_ID;
  }
  function getAdmin_ID()
  {
    return $this->admin_ID;
  }}
  trait BookFunctions
  {
    static function searchForBooks($name, $author)
    {
      if (empty($name)) {
        error422("Enter book name");
      } elseif (empty($author)) {
        error422("Enter book author");
      } else {
        $name = trim(htmlspecialchars($name));
        $author = (htmlspecialchars($author));
        $bookModel = new model\Book();
        $filterCols = ['name', 'author'];
        $filterVals = [$name, $author];
        $result = $bookModel->read($filterCols, $filterVals);
        return $result;
      }
    }
    static function readBooks($is_borrowed)
    {
      if ($is_borrowed = 0) {
        $bookModel = new model\Book();
        $result = $bookModel->read("is_borrowed", 0);
      } else {
        $bookModel = new model\Book();
        $result = $bookModel->read("is_borrowed", 1);
      }
  
      return $result;
    }
  
    static function createBook($name, $author, $image, $description, $admin_ID)
    {
      if (empty(trim($name))) {
        return error422("Enter book name!");
      } elseif (empty(trim($author))) {
        return error422("Enter auther name!");
      } elseif (empty(trim($description))) {
        return error422("Enter book description!");
      } elseif (empty(trim($admin_ID))) {
        return error422("Enter your ID!");
      } elseif (!isset($_FILES['image']) || $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
        return error422(" upload a book image!");
      } else {
        $name = trim(filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $author = trim(filter_var($author, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $description = trim(filter_var($description, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $admin_ID = htmlspecialchars(filter_var($admin_ID, FILTER_SANITIZE_NUMBER_INT));
        $x = "book_";
        $path = "Images/Book";
        $imageHandling = new  Images();
        $new_image = $imageHandling->createImage($x, $path, $image);
        if (filter_var($admin_ID, FILTER_VALIDATE_INT)) {
          return error422("Invalid ID!");
        } else {
          $bookModel = new model\Book();
          return $bookModel->create($name, $author, $new_image, $description, $admin_ID);
        }
      }
    }
  
  
  
    static function updateBook($book_ID, $name, $author, $image, $description, $admin_ID, $is_borrowed, $Uname, $Uauthor, $Uimage, $Udescription, $Uis_borrowed)
    {
      $bookModel = new model\Book();
      $Ucol = ["name", "author", "image", "description", "is_borrowed"];
      $Uval = [$Uname, $Uauthor, $Uimage, $Udescription, $Uis_borrowed];
      $Fcol = ["book_ID", "name", "author","image", "description", "admin_ID", "is_borrowed"];
      $Fval = [$book_ID, $name, $author, $image,$description, $admin_ID, $is_borrowed];
      $result = $bookModel->read($Fcol, $Fval);
      $result = json_decode($result);
      $result = $result["data"];
      if (isset($result)) {
        if ($arr = mysqli_fetch_assoc($result)) {
          if (empty($Uname)) {
            $Uname = $arr["name"];
          }
          if (empty($Uauthor)) {
            $Uauthor = $arr["author"];
          }
          if (empty($Uimage)) {
            $Uimage = $arr["image"];
          }
          if (empty($Udescription)) {
            $Udescription = $arr["description"];
          }
          if (empty($Uis_borrowed)) {
            $Uis_borrowed = $arr["is_borrowed"];
          }
           
        }
      }
       else {
        $bookModel = new model\Book();
        $bookModel->update($Ucol, $Uval, $Fcol, $Fval);
        if (isset($result)) {
          if ($arr = mysqli_fetch_assoc($result)) {
            switch ($arr["is_borrowed"]) {
              case 0:
                $book = new Book($arr["book_ID"], $arr["name"], $arr["author"], $arr["image"], $arr["description"], $arr["is_borrowed"], $arr["admin_ID"], $arr["created_at"], $arr["updated_at"]);
                break;
              case 1:
                $book = new BorrowedBook($arr["book_ID"], $arr["name"], $arr["author"], $arr["image"], $arr["description"], $arr["is_borrowed"], $arr["admin_ID"], $arr["created_at"], $arr["updated_at"]);
                break;
            }
          }
        }
      }
    }
  
   static function deleteBook($name, $author)
    {
       $bookModel = new model\Book();
        $filterCols = ['name', 'author'];
        $filterVals = [$name, $author];
        $result = $bookModel->delete($filterCols, $filterVals);
        
      }
 
  }


//in admin
use BookFunctions;

//in student


use BookFunctions{

  searchForBooks as public;
  readBooks as public;
  createBook as private;
  updateBook as private;
  deleteBook as private;
      
  }
  use StuBB;

  // in errors

  
function error413($message){
  $data=[
    'status'=>413,
    'Message'=>$message 
   ];
   header("HTTP/1.1 413 Payload Entity Too Large");
   return json_encode($data);
  
  }

?>