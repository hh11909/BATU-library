<?php
require_once("../../controller/User.php");

use controller\User;

session_start();
// header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == "POST") {
  if (empty($_POST["email"])) {
    header("Location:../../pages/login.php?err=emptyEmail");
  } elseif (empty($_POST["password"])) {
    header("Location:../../pages/login.php?err=emptyPass");
  } elseif (isset($_POST["email"]) && isset($_POST["password"])) {
    $user = User::login($_POST["email"], $_POST["password"]);
    if (isset($user->role)) {
      if ($user->role == "student") {
        if (isset($_POST["remember"]) && $_POST["remember"] == 1) {
          setcookie("user", serialize($user), time() + 60 * 60 * 24 * 7, "/"); //one weak
        }
        $_SESSION["user"] = serialize($user);
        header("Location:../../pages/index.php");
      } elseif ($user->role == "admin") {
        $_SESSION["user"] = serialize($user);
        header("Location:../../pages/dashboard.php");
      }
    } else {
      header("Location:../../pages/login.php?err=notRegistered");
    }
  }
} else {
  $data = [
    'status' => 405,
    'Message' => $requestMethod . " Method Not Allowed"
  ];
  header("HTTP/1.0 405 Method Not Allowed");
  echo json_encode($data);
}

