<?php

use controller\Admin;

require_once("../../controller/Admin.php");
session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];


if ($requestMethod == "DELETE") {
  if (isset($_SESSION["user"])) {
    $user = unserialize($_SESSION["user"]);
    if ($user->role != "admin") {
      echo error422("you are not authorized to be here!");
      header("Location:../../pages/index.php");
    } else {
      if (isset($_POST["id"])) {
        $book = Admin::deleteBook($_POST["id"]);
        echo $book;
      } else {
        echo error422("please send data!");
      }
    }
  }
} else {

  echo error422("method not allowed!");
}
