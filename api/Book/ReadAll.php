<?php

use controller\Student;

require_once("../../controller/Student.php");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "GET") {
  if (isset($_GET["is_borrowed"])) {
    if ($_GET["is_borrowed"] == 0) {
      $book = Student::readBooks($inputData["is_borrowed"]);
      $message = json_decode($book);
      echo $message->Message;
    } elseif ($_GET["is_borrowed"] == 1) {
      $book = Student::readBooks($_GET["is_borrowed"]);
      echo $book;
    }
  }
}
