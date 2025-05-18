<?php

use controller\Student;

require_once("../../controller/Student.php");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "GET") {
  if (isset($_GET["name"]) && isset($_GET["author"])) {
    $book = Student::readBooks($_GET["name"], $_GET["author"]);
    echo $book;
  } elseif (isset($_GET["name"])) {
    $book = Student::ReadBooks($_GET["name"]);
    echo $book;
  } elseif (isset($_GET["author"])) {
    $book = Student::readBBooks($_GET["author"]);
    echo $book;
  } else {
    $book = Student::readBBooks("");
    echo $book;
  }
} else {

  echo error422("method not allowed!");
}
