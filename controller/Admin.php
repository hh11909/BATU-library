<?php

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
            $arr["admin_ID"],
          );
          return $user;
        }
      }
    }
    error422("No Result");
    return null;
  }
  private function check(): true
  {
    if (empty($this->email) || empty($this->password) || empty($this->id) || $this->role != 'admin') {
      error422("Admin is not authorized");
    }
    return true;
  }
  public function updatePassword(string $newPassword)
  {
    $newPassword = md5(htmlspecialchars($newPassword));
    $model = new \model\Admin();
    $cols = ['password'];
    $vals = [$newPassword];
    $filterCols = ['email', 'admin_ID'];
    $filterVals = [$this->email, $this->id];
    if ($this->check()) {
      $result = $model->update($cols, $vals, $filterCols, $filterVals);
      $result = json_decode($result, true);
      echo json_encode([
        "status" => $result['status']
      ]);
    }
  }
}
