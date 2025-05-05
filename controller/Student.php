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
  public $phone;
  public $gender;
  public $department_ID;
  public $student_image;
  public $profile_image;
  public $is_friend = 0;
  private $admin_ID;
  function __construct($name, $academy_number, $phone, $gender, $department_ID, $email, $is_friend, $admin_ID, $student_image = null, $profile_image = null, $id = null, $password = null)
  {
    if ($id != null) {
      $this->id = $id;
    }
    $this->role = 'student';
    $this->name = $name;
    $this->academy_number = $academy_number;
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

  function setPassword($pass)
  {
    $this->password = $pass;
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
    if (is_array($result)) {
      $result = $result["data"];
    }
    if (isset($result)) {
      if ($arr = $result[0]) {
        switch ($arr['is_friend']) {
          case 0:
            $user = new Student($arr["name"], $arr["academy_number"], $arr["phone"], $arr["gender"], $arr["department_ID"], $arr["email"], $arr["is_friend"], $arr["admin_ID"], $arr["student_image"], $arr["profile_image"], $arr["student_ID"]);
            break;
          case 1:
            $user = new Friend($arr["name"], $arr["academy_number"], $arr["phone"], $arr["gender"], $arr["department_ID"], $arr["email"], $arr["is_friend"], $arr["admin_ID"], $arr["student_image"], $arr["profile_image"], $arr["student_ID"]);
            break;
        }
        return $user;
      }
    }
    return null;
  }
  function create()
  {
    $this->sanitize();
    if ($this->validate()) {
      $model = new StudentModel();
      return $model->create($this);
    }
  }

  protected function sanitize()
  {
    // Continue Sanitization
    $this->name = trim(filter_var($this->name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $this->academy_number = trim(htmlspecialchars(filter_var($this->academy_number, FILTER_SANITIZE_NUMBER_INT)));
    $this->phone = trim(htmlspecialchars(filter_var($this->phone, FILTER_SANITIZE_NUMBER_INT)));
    $this->gender = trim(filter_var($this->gender, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $this->department_ID = htmlspecialchars(filter_var($this->department_ID, FILTER_SANITIZE_NUMBER_INT));
    $this->email = trim(htmlspecialchars(filter_var($this->email, FILTER_SANITIZE_EMAIL)));
    $this->password = md5(htmlspecialchars($this->password));
    $this->admin_ID = htmlspecialchars(filter_var($this->admin_ID, FILTER_SANITIZE_NUMBER_INT));
    $this->is_friend = htmlspecialchars(filter_var($this->is_friend, FILTER_SANITIZE_NUMBER_INT));
  }
  protected function validate()
  {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      return error422("Invalid Email!");
    } elseif (!filter_var($this->academy_number, FILTER_VALIDATE_INT)) {
      return error422("Invalid Academy Number!");
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

  //in Admin class+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  function storeStudent(Student $student)
  {
    // Sanitization
    $this->sanitize();
    // Validation
    if ($this->validate()) {
      $stu = new StudentModel();
      return $stu->create($student);
    }
  }
}
