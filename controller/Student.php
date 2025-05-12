<?php

namespace controller;

use model\Student as StudentModel;

require_once(__DIR__ . "/../model/Student.php");
require_once(__DIR__ . "/User.php");
require_once(__DIR__ . "/Friend.php");
require_once(__DIR__ . "/../model/errors.php");

class Student extends User
{
  public $academy_number;
  public $academic_year;
  public $phone;
  public $gender;
  public $department_ID;
  public $student_image;
  public $profile_image;
  public $is_friend = 0;
  private $admin_ID;
  function __construct($name, $academy_number, $academic_year, $phone, $gender, $department_ID, $email, $password, $is_friend, $admin_ID, $student_image = null, $profile_image = null, $id = null)
  {
    if ($id != null) {
      $this->id = $id;
    }
    $this->role = 'student';
    $this->name = $name;
    $this->academy_number = $academy_number;
    $this->academic_year = $academic_year;
    $this->phone = $phone;
    $this->gender = $gender;
    $this->department_ID = $department_ID;
    $this->email = $email;
    $this->password = $password;
    $this->student_image = $student_image;
    $this->profile_image = $profile_image;
    $this->is_friend = $is_friend;
    $this->admin_ID = $admin_ID;
  }

  function updatePassword($pass)
  {
    $stu = new StudentModel();
    $stu->update(["password"], [md5(htmlspecialchars($pass))], ["academy_number"], [$this->academy_number]);
  }
  function updatePhone($phone)
  {
    $stu = new StudentModel();
    $stu->update(["phone"], [trim(htmlspecialchars(filter_var($phone, FILTER_SANITIZE_NUMBER_INT)))], ["academy_number"], [$this->academy_number]);
  }
  function getPassword()
  {
    return $this->password;
  }
  function setAdmin_ID($admin_ID)
  {
    $this->admin_ID = $admin_ID;
  }
  function getAdmin_ID()
  {
    return $this->admin_ID;
  }

  static function login($email, $password): Student | Friend | null
  {
    $stuModel = new StudentModel();
    $cols = ['email', 'password'];
    $vals = [$email, $password];
    $result = $stuModel->read($cols, $vals);
    $result = json_decode($result, true);
    if (isset($result["data"])) {
      $result = $result["data"];
      if ($arr = $result[0]) {
        switch ($arr['is_friend']) {
          case 0:
            $user = new Student($arr["name"], $arr["academy_number"], $arr["academic_year"], $arr["phone"], $arr["gender"], $arr["department_ID"], $arr["email"], $arr["password"], $arr["is_friend"], $arr["admin_ID"], $arr["student_image"], $arr["profile_image"], $arr["student_ID"]);
            break;
          case 1:
            $user = new Friend($arr["name"], $arr["academy_number"], $arr["academic_year"], $arr["phone"], $arr["gender"], $arr["department_ID"], $arr["email"], $arr["password"], $arr["is_friend"], $arr["admin_ID"], $arr["student_image"], $arr["profile_image"], $arr["student_ID"]);
            break;
        }
        return $user;
      }
    }
    return null;
  }
  function create()
  {
    $model = new StudentModel();
    return $model->create($this);
  }
  static function read($name = "", $academy_number = "", $academic_year = "", $phone = "", $email = "", $limit = 0, $offset = 0)
  {
    $cols = ['name', 'academy_number', 'academic_year', 'phone', 'email'];
    $name = trim(filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $academy_number = trim(htmlspecialchars(filter_var($academy_number, FILTER_SANITIZE_NUMBER_INT)));
    $academic_year = trim(htmlspecialchars(filter_var($academic_year, FILTER_SANITIZE_NUMBER_INT)));
    $phone = trim(htmlspecialchars(filter_var($phone, FILTER_SANITIZE_NUMBER_INT)));
    if ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return error422("Invalid Email!");
    } elseif ($academy_number != "" && !filter_var($academy_number, FILTER_VALIDATE_INT)) {
      return error422("Invalid Academy Number!");
    } elseif ($academic_year != "" && !filter_var($academic_year, FILTER_VALIDATE_INT)) {
      return error422("Invalid Academy Number!");
    } elseif ($phone != "" && !preg_match("/^01[0-2,5]{1}[0-9]{8}$/", $phone)) {
      return error422("Invalid Academy Phone!");
    }
    $vals = [$name, $academy_number, $academic_year, $phone, $email];
    $model = new StudentModel();
    $result = $model->read($cols, $vals, 1);
    $result = json_decode($result, true);
    if (isset($result["data"])) {
      $count = count($result["data"]);
      $result["count"] = $count;
    }
    return json_encode($result);
  }
  static function delete($student_ID)
  {
    $model = new StudentModel();
    return $model->delete(["student_ID",], [$student_ID]);
  }
  public function sanitize()
  {
    // Continue Sanitization
    $this->name = trim(filter_var($this->name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $this->academy_number = trim(htmlspecialchars(filter_var($this->academy_number, FILTER_SANITIZE_NUMBER_INT)));
    $this->academic_year = trim(htmlspecialchars(filter_var($this->academic_year, FILTER_SANITIZE_NUMBER_INT)));
    $this->phone = trim(htmlspecialchars(filter_var($this->phone, FILTER_SANITIZE_NUMBER_INT)));
    $this->gender = trim(filter_var($this->gender, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $this->department_ID = htmlspecialchars(filter_var($this->department_ID, FILTER_SANITIZE_NUMBER_INT));
    $this->email = trim(htmlspecialchars(filter_var($this->email, FILTER_SANITIZE_EMAIL)));
    $this->password = md5(htmlspecialchars($this->password));
    $this->admin_ID = htmlspecialchars(filter_var($this->admin_ID, FILTER_SANITIZE_NUMBER_INT));
    $this->is_friend = htmlspecialchars(filter_var($this->is_friend, FILTER_SANITIZE_NUMBER_INT));
  }
  public function validate()
  {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      return error422("Invalid Email!");
    } elseif (!filter_var($this->academy_number, FILTER_VALIDATE_INT)) {
      return error422("Invalid Academy Number!");
    } elseif ($this->academic_year != "" && !filter_var($this->academic_year, FILTER_VALIDATE_INT)) {
      return error422("Invalid Academic year!");
    } elseif (!preg_match("/^01[0-2,5]{1}[0-9]{8}$/", $this->phone)) {
      return error422("Invalid Academy Phone!");
    } elseif (!filter_var($this->department_ID, FILTER_VALIDATE_INT)) {
      return error422("Invalid Department ID!");
    } elseif (!filter_var($this->admin_ID, FILTER_VALIDATE_INT)) {
      return error422("Invalid Phone Number!");
    } elseif (filter_var($this->is_friend, FILTER_VALIDATE_BOOLEAN)) {
      return error422("Invalid Is Friend Bool Value!");
    }
    $this->admin_ID = (int)$this->admin_ID;
    $this->department_ID = (int)$this->department_ID;
    $this->academy_number = (int)$this->academy_number;
    $this->is_friend = (bool) $this->is_friend;
    return true;
  }
}
