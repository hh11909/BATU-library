<?php

use controller\Admin;

require_once("../../controller/Admin.php");
session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:PUT");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "POST") {
  if (isset($_SESSION["book"])) {
    if (isset($_SESSION["user"])) {
      $user = unserialize($_SESSION["user"]);
      $book = unserialize($_SESSION["book"]);
      if ($user->role != "admin") {
        echo error422("you are not authorized to be here!");
        header("Location:../../pages/index.php");
      } else {
        if (isset($_POST["Uauthor"]) || isset($_POST["Uimage"]) || isset($_POST["Udescription"]) || isset($POST["Uis_borrowed"])) {
          $book = Admin::updateBook($book->book_ID, $book->name, $book->author, $book->image, $book->description, $book->admin_ID, $book->is_borrowed, $_POST["Uname"], $_POST["Uauthor"], $_POST["Uimage"], $_POST["Udescription"], $_POST["Uis_borrowed"]);
          $message = json_decode($book);
          echo $message->Message;
        }
      }
    }
  }
}
