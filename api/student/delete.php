<?php
require_once("../../controller/Student.php");
require_once("../../controller/Admin.php");

use controller\Admin;
session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");

if ($_SERVER["REQUEST_METHOD"]=="DELETE") {
  if(isset($_SESSION["user"])){
    /**@var Admin $user*/
    $user=unserialize($_SESSION["user"]);
    if($user->role!="admin"){
      echo error422("you are not authorized to be here!");
      header("Location:../../pages/admin/admin-users.php");
    }
    else{
      if(isset($_GET["student_ID"])){
        echo $user->deleteStudent($_GET["student_ID"]);
      }
      else{
        header("Location:/../../../pages/login.php");
      }
    }
  }
  else{
    echo error422("you are not authorized to be here!");
    header("Location:/../../../pages/login.php");
  }

  
}
