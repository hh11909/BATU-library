<?php

namespace controller;


// require(__DIR__."/../model/errors.php");
require(__DIR__."/../model/Book.php");
require(__DIR__."/../model/BBooks.php");
require("Images.php");
use model\Book as BookModel;
/*class Book
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
  }*/
  trait Book
  {
    static function searchForBooks($name =null, $author= null)
    {
      if ( !empty($name) || !empty($author) )  {
        if ( !empty($name) && !empty($author) )  {
          $name = trim(htmlspecialchars($name));
          $author = (htmlspecialchars($author));
          $bookModel = new BookModel();
         $filterCols = ['name', 'author'];
         $filterVals = [$name, $author];
         $result = $bookModel->read($filterCols, $filterVals);
        }
        else if
       (empty($author)) {
       $name = trim(htmlspecialchars($name));
       $bookModel = new BookModel();
       $result = $bookModel->read('name', $name);
       
       }
       else{
        $author = (htmlspecialchars($author));
        $bookModel = new BookModel();
        $result = $bookModel->read('author', $author);
        

       }}
       else {
        $result = error422("Enter book name or author");

      }
       return $result;
      }
        
      
    static function readBooks($is_borrowed)
    {
      $bookModel = new BookModel();
      $result = $bookModel->read("is_borrowed", $is_borrowed);
      return $result;
    }


    static function readBooById($book_ID)
    {
        $bookModel = new BookModel();
        $result = $bookModel->read("book_ID", $book_ID);
  
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
        $path = "Images/Book/";
        $imageHandling = new  Images();
        $new_image = $imageHandling->createImage($x, $path, $image);
        if (filter_var($admin_ID, FILTER_VALIDATE_INT)) {
          return error422("Invalid ID!");
        
        } else {
          $bookModel = new BookModel();
          return $bookModel->create($name, $author, $new_image, $description, $admin_ID);
        }
      }
    }
  
  
  
    static function updateBook( $name, $author, $Uname , $Uauthor , $Uimage, $Udescription, $Uis_borrowed)
    {
      $bookModel = new BookModel();
      $Fcol = [ "name", "author"];
      $Fval = [ $name, $author];
      $result = $bookModel->read($Fcol, $Fval);
      $result = json_decode($result,true);
      $result = $result["data"];
      if (isset($result)) {
           $result=$result[0];

          if (empty($Uname)) {
            $Uname = $result["name"];
          }
          if (empty($Uauthor)) {
            $Uauthor = $result["author"];
          }
          if (empty($Udescription)) {
            $Udescription = $result["description"];
          }
          if (empty($Uis_borrowed)) {
            $Uis_borrowed = $result["is_borrowed"];
          }
          if (!isset($_FILES['image'])) {
            $Uimage = $result["image"];
          }
           
        
      
       
        $Uname = trim(filter_var($Uname, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $Uauthor = trim(filter_var($Uauthor, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $Udescription = trim(filter_var($Udescription, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $Uis_borrowed= htmlspecialchars(filter_var($Uis_borrowed, FILTER_SANITIZE_NUMBER_INT));
        $x = "book_";
        $path = "Images/Book";
        $imageHandling = new  Images();
        $new_image = $imageHandling->createImage($x, $path, $Uimage);
        if (filter_var($Uis_borrowed, FILTER_VALIDATE_BOOLEAN)) {
          return error422("Invalid Is borrowed  Value!");
        }
        else {
          $Ucol = ["name", "author", "image", "description", "is_borrowed"];
          $Uval = [$Uname, $Uauthor, $new_image , $Udescription, $Uis_borrowed];
  
          return $bookModel->update($Ucol, $Uval, $Fcol, $Fval);
        }
          //$result = json_decode($result);
          //$result = $result["data"];
          //if (isset($result)) {
          //if ($arr = mysqli_fetch_assoc($result)) {
            //switch ($arr["is_borrowed"]) {
              //case 0:
                //$book = new Book($arr["book_ID"], $arr["name"], $arr["author"], $arr["image"], $arr["description"], $arr["is_borrowed"], $arr["admin_ID"], $arr["created_at"], $arr["updated_at"]);
                //break;
              //case 1:
                //$book = new BorrowedBook($arr["book_ID"], $arr["name"], $arr["author"], $arr["image"], $arr["description"], $arr["is_borrowed"], $arr["admin_ID"], $arr["created_at"], $arr["updated_at"]);
                //break;
          //  }
          //}
       // }

      }
      else
      {
        return error422("this book did not originaly exist , please create one !");
      }

    }
   static function deleteBook($name, $author)
    {
      $name = trim(filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $author = trim(filter_var($author, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $bookModel = new BookModel();
        $filterCols = ['name', 'author'];
        $filterVals = [$name, $author];
        return $bookModel->delete($filterCols, $filterVals);
        
      }

      static function readBBooks($student_ID){
        $bookModel = new BookModel();
        $result = $bookModel->read($student_ID );
      return $result;
    }
 
  }


  
// //in admin
// use Book;






// //in student


// use Book{

//   searchForBooks as public;
//   readBooks as public;
//   readBBooks as public;
 // readBooById  as public;
//   createBook as private;
//   updateBook as private;
//   deleteBook as private;
  
      
//   }
//    // in errors

  
//  function error413($message){
//   $data=[
//     'status'=>413,
//     'Message'=>$message 
//    ];
//    header("HTTP/1.1 413 Payload Entity Too Large");
//    return json_encode($data);
  
//   }








?>