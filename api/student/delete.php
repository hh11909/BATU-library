<?php
require_once("../../controller/Student.php");
require_once("../../controller/Admin.php");

use controller\Admin;
session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
# check all requirements
$check = false;
$missed_attributes = [];
$attributes = [
  "name",
  "email",
  "pass",
  "phoneNumber",
  "academy_number",
  "academic_year",
  "gender",
  "department_ID",
  // "admin_ID"
];

if ($_SERVER["REQUEST_METHOD"]=="DELETE") {
  if(isset($_SESSION["user"])){
    /**@var Admin $user*/
    $user=unserialize($_SESSION["user"]);
    if($user->role!="admin"){
      echo error422("you are not authorized to be here!");
      header("Location:../../pages/index.php");
    }
    else{
      if(isset($_POST["student_ID"])){
        $user->deleteStudent($_POST["student_ID"]);
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
