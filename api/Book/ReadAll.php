<?php

use controller\Student;

require_once("../../controller/Student.php");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "GET") {
  if (isset($_GET["is_borrowed"])) {
    if ($_GET["is_borrowed"] == 0 || $_GET["is_borrowed"] == 1) {
      $name = (isset($_GET["name"])) ? $_GET["name"] : "";
      $author = (isset($_GET["author"])) ? $_GET["author"] : "";
      $book = Student::readBooks($name, $author, $_GET["is_borrowed"]);
      echo $book;
    }
  } else {
    $book = Student::readBooks();
    echo $book;
  }
} else {

  echo error422("method not allowed!");
}
