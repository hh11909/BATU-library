<?php

use controller\Student;
use controller\Friend;

require_once("../../controller/Student.php");
require_once("../../controller/Friend.php");
session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == "GET") {
  if (isset($_SESSION["user"])) {
    if ($_SESSION["role"] == "student") {
      /**@var Student $user */
      $user = unserialize($_SESSION["user"]);
      $book = Student::readBBooks($user->student_ID);
    } elseif ($_SESSION["role"] == "friend") {
      /**@var Friend $user */
      $user = unserialize($_SESSION["user"]);
      $book = Friend::readBBooks($user->student_ID);
    }
    if (isset($book)) {
      echo $book;
    }
  } else {
    echo error422("you are not allowed to be here");
  }
} else {

  echo error422("method not allowed!");
}
