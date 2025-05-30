<?php

use controller\Admin;

require_once("../../controller/Admin.php");
session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == "POST") {
  if (isset($_SESSION["user"])) {
    $user = unserialize($_SESSION["user"]);
    if ($user->role != "admin") {
      echo error422("you are not authorized to be here!");
      header("Location:../../pages/index.php");
    } else {
      if (isset($_POST["name"]) && isset($_POST["author"])) {
        if (!(isset($_POST["Uname"]))) {

          $Uname = null;
        } else {

          $Uname = $_POST["Uname"];
        }
        if (!(isset($_POST["Uauthor"]))) {

          $Uauthor = null;
        } else {

          $Uauthor = $_POST["Uauthor"];
        }
        if (!(isset($_FILES["Uimage"]))) {

          $Uimage = null;
        } else {

          $Uimage = $_FILES["Uimage"];
        }
        if (!(isset($_POST["Udescription"]))) {

          $Udescription = null;
        } else {

          $Udescription = $_POST["Udescription"];
        }
        if (!(isset($_POST["Uis_borrowed"]))) {

          $Uis_borrowede = null;
        } else {

          $Uis_borrowed = $_POST["Uname"];
        }
        $book = Admin::updateBook($_POST["name"], $_POST["author"], $Uname, $Uauthor, $Uimage, $Udescription, $Uis_borrowede);
        echo $book;
      } else {

        echo error422("please select the book you want update!");
      }
    }
  }
} else {

  echo error422("method not allowed!");
}
