<?php
require_once("../../controller/Student.php");
require_once("../../controller/Admin.php");

use controller\Admin;
use controller\Student;
session_start();
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
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

if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if(isset($_SESSION["user"])){
    /**@var Admin $user*/
    $user=unserialize($_SESSION["user"]);
    if($user->role!="admin"){
      echo error422("you are not authorized to be here!");
      header("Location:../../pages/index.php");
    }
  }
  else{
    echo error422("you are not authorized to be here!");
    header("Location:../../pages/login.php");
  }
  foreach ($attributes as $attribute) {
    if (!empty($_POST[$attribute])) {
      $check = true;
    } else {
      array_push($missed_attributes, $attribute);
    }
  }
  $invalid=json_decode(Student::read("",$_POST["academy_number"]),true);
  if(isset($invalid["data"])){
    echo error422("academy_number already exists");
    var_dump((int)$_POST['is_friend']??0);
  }
  else{
    $invalid=json_decode(Student::read('','','','',$_POST["email"]),true);
    if(isset($invalid["data"])){
      echo error422("email already exists");
    }else{
      $invalid=json_decode(Student::read('','','',$_POST["phoneNumber"],''),true);
      if(isset($invalid["data"])){
        echo error422("phone number already exists");
      }else{
         if ($check && count($missed_attributes) == 0) {
    $student = new Student(
      name: $_POST['name'],
      email: $_POST['email'],
      password: $_POST['pass'],
      phone: $_POST['phoneNumber'],
      is_friend: $_POST['is_friend']??0,
      admin_ID: $user->id??null,
      department_ID: $_POST['department_ID'],
      gender: $_POST['gender'],
      academy_number: $_POST['academy_number'],
      academic_year:$_POST['academic_year'],
    );
    $res= $user->storeStudent($student);
    header("Location:../../../pages/register.php");
    $res=json_decode($res,1);
    $res=$res["Message"];
    echo $res;

  } else {
    $missed_attributes = implode(", ", $missed_attributes);
    $res = [
      "status" => 400,
      "message" => "These attributes are missing: $missed_attributes"
    ];
    echo json_encode($res);
  }

      }
    }
  }
  
 
}
