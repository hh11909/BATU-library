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
    $message = json_decode($book);
    echo $message->Message;
  }
}
