<?php

use controller\Student;

require_once("../../controller/Student.php");
session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");

if (isset($_SESSION["user"])) {
  $user = unserialize($_SESSION["user"]);
  $book = Student::readBBooks($user->$academy_number);
  $message = json_decode($book);
  echo $message->Message;
}
