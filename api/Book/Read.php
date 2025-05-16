<?php

use controller\Student;

require_once("../../controller/Student.php");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "GET") {
  if (isset($_GET["name"]) && isset($_GET["author"])) {
    $book = Student::searchForBooks($_GET["name"], $_GET["author"]);
    ;
    echo $book;
  }
  elseif (isset($_GET["name"])) {
  $book = Student::searchForBooks($_GET["name"]);

    echo $book;
  }
  elseif(isset($_GET["author"])) {
    $book = Student::searchForBooks( $_GET["author"]);
    
    echo $book;
  }
  else{
    $book = Student::searchForBooks( );
  
    echo $book;
  }
   
  }

