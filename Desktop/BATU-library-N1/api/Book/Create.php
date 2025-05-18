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
      if (isset($_POST["name"]) && isset($_POST["author"]) && isset($_POST["image"]) && isset($_POST["description"]) && isset($_POST["admin_ID"])) {
        $book = Admin::createBook($_POST["name"], $_POST["author"],  $_POST["image"], $_POST["description"],  $_POST["admin_ID"]);
        $message = json_decode($book);
        echo $message->Message;
      }
    }
  }
}
