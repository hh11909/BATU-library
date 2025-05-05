<?php
require_once("../../controller/Student.php");

use controller\Student;

if (!isset($_SESSION)) {
  session_start();
}
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
      profile_image: $_POST['profile_image'],
      student_image: $_POST['student_image'],
      id: $_POST['id'] ?? null,
    );
    echo $student->create();
  } else {
    $missed_attributes = implode(", ", $missed_attributes);
    $res = [
      "status" => 400,
      "message" => "These attributes are missing: $missed_attributes"
    ];
    echo json_encode($res);
  }
}
