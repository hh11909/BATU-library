<?php
require_once("../../../controller/Student.php");
require_once("../../../controller/Admin.php");

use controller\Student;
session_start();
// header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");

if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if(isset($_SESSION["user"])){
    /**@var Student $user*/
    $user=unserialize($_SESSION["user"]);
    if($user->role!="student"){
      echo error422("you are not authorized to be here!");
      header("Location:../../pages/login.php");
    }
    else{
      if(isset($_FILES)){

        echo $user->updateProfileImage($_FILES["profileImage"]);
        $_SESSION["user"]=serialize($user);

      }
      else{
        echo error422("No File Added");
      }
    }
  }
  else{
    echo error422("you are not authorized to be here!");
    header("Location:../../../pages/login.php");
  }
}
else{
  echo error422("method not allowed!");
}
