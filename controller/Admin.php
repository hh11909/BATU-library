There are some edits in Crud.php in read method
take a look at it.

and you will be conflicted with how much con<?php

namespace controller;

require_once("User.php");
require_once(__DIR__ . "/../model/Admin.php");

use controller\User;


class Admin extends User
{
  public $role = "admin";
  public function __construct(
    string $name,
    string $email,
    string $password,
    ?int $id
  ) {
    if ($id != null) {
      $this->id = $id;
    }
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }
  public function to_json(): string | null
  {
    if ($this->name && $this->email && $this->password) {
      $arr = [];
      $arr['id'] = $this->id;
      $arr['name'] = $this->name;
      $arr['email'] = $this->email;
      $arr['role'] = $this->role;
      return json_encode($arr);
    }
    return null;
  }
  static function login(string $email, string $password): Admin | null
  {
    if (empty($email)) {
      error422("Enter Your Email");
    } elseif (empty($password)) {
      error422("Enter Your Password");
    } else {
      $email = trim(htmlspecialchars(filter_var($email, FILTER_SANITIZE_EMAIL)));
      $password = md5(htmlspecialchars($password));
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        error422("Invalid Email!");
      } else {
        $stuModel = new \model\Admin();
        $cols = ['email', 'password'];
        $vals = [$email, $password];
        $result = $stuModel->read($cols, $vals);
        $result = json_decode($result, true);
        $result = $result["data"];
        if (isset($result)) {
          if ($arr = $result[0]) {
            $user = new Admin(
              $arr["name"],
              $arr["email"],
              $arr["password"],
              $arr["id"],
            );
            return $user;
          }
        }
      }
    }
    return error422("No Result");
  }
}
