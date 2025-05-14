<?php
require_once("../../controller/Student.php");
require_once("../../controller/Admin.php");

use controller\Admin;
session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
if ($_SERVER["REQUEST_METHOD"]=="GET") {
  if(isset($_SESSION["user"])){
    /**@var Admin $user*/
    $user=unserialize($_SESSION["user"]);
    if($user->role!="admin"){
      echo error422("you are not authorized to be here!");
      header("Location:../../pages/index.php");
    }
    else{
      $academy_number=(isset($_GET["academy_number"]))?$_GET["academy_number"]:"";
      $academic_year=(isset($_GET["academic_year"]))?$_GET["academic_year"]:"";
      $name=(isset($_GET["name"]))?$_GET["name"]:"";
      $phone=(isset($_GET["phone"]))?$_GET["phone"]:"";
      $res=$user->readStudents($name,$academy_number,$academic_year,$phone);
      echo $res;
    }
  }
  else{
    echo error422("you are not authorized to be here!");
    header("Location:/../../../pages/login.php");
  }
}

