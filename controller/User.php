<?php

namespace controller;

require_once("Student.php");
require_once("Admin.php");

use controller\Admin;
use controller\Student;

class User
{
  public $id;
  public $name;
  public $email;
  protected $password;
  public $role;
  public $created_at;
  public $updated_at;

  static function login(string $email, string $password)
  {
    if (empty($email)) {
      error422("Enter Your Email");
    } elseif (empty($password)) {
      error422("Enter Your Password");
    } else {
      $email = trim(htmlspecialchars(filter_var($email, FILTER_SANITIZE_EMAIL)));
      $password = md5(htmlspecialchars($password));
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return error422("Invalid Email!");
      } else {
        $result = Student::login($email, $password);
        if (empty($result)) {
          $result = Admin::login($email, $password);
          if (empty($result)) {
            return error422("Please Register Now!");
          }
        }
        return $result;
      }
    }
  }
}
