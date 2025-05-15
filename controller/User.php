<?php

namespace controller;

require_once(__DIR__ . "/Student.php");
require_once(__DIR__ . "/Admin.php");

class User
{
  public $id;
  public $name;
  public $email;
  protected $password;
  public $role;
  public $created_at;
  public $updated_at;

  private static function validate(string $email, string $password): true
  {
    if (empty($email)) {
      error422("Enter Your Email");
    } elseif (empty($password)) {
      error422("Enter Your Password");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      error422("Your Email is not Valid");
    }
    return true;
  }

  static function login(string $email, string $password): Admin | Student | Friend | null
  {
    if (self::validate($email, $password)) {
      $email = trim(htmlspecialchars(filter_var($email, FILTER_SANITIZE_EMAIL)));
      $password = md5(htmlspecialchars($password));
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        error422("Invalid Email!");
        return null;
      } else {
        $result = Student::login($email, $password);
        if (empty($result)) {
          $result = Admin::login($email, $password);
          if (empty($result)) {
            error422("Please Register Now!");
            header("HTTP/1.0 302 Redirect");
            header("Location: /pages/register1.html");
            return null;
          }
        }
        return $result;
      }
    }
    error422("User Not Found");
    return null;
  }
}
