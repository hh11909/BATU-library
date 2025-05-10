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
  "password",
  "phone",
  "academy_number",
  "gender",
  "department_ID",
  "admin_ID"
];

if ($_POST) {
  if(isset($_SESSION["user"])){
    /**@var Admin $user*/
    $user=unserialize($_SESSION["user"]);
    if($user->role!="admin"){
      echo error422("you are not authorized to be here!");
      header("Location:/../../../pages/index.php");
    }
  }
  else{
    echo error422("you are not authorized to be here!");
    header("Location:/../../../pages/login.php");
  }
  foreach ($attributes as $attribute) {
    if (!empty($_POST[$attribute])) {
      $check = true;
    } else {
      array_push($missed_attributes, $attribute);
    }
  }
  if ($check && count($missed_attributes) == 0) {
    $student = new Student(
      name: $_POST['name'],
      email: $_POST['email'],
      password: $_POST['password'],
      phone: $_POST['phone'],
      is_friend: $_POST['is_friend'] ?? 0,
      admin_ID: $_POST['admin_ID'],
      department_ID: $_POST['department_ID'],
      gender: $_POST['gender'],
      academy_number: $_POST['academy_number'],
      student_image: $_POST['student_image'],
    );
    echo $user->storeStudent($student);
  } else {
    $missed_attributes = implode(", ", $missed_attributes);
    $res = [
      "status" => 400,
      "message" => "These attributes are missing: $missed_attributes"
    ];
    echo json_encode($res);
  }
}
