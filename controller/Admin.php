<?php

namespace controller;

use controller\User;
use model\Admin;

require_once("./User.php");
require_once(__DIR__ . "/model/Admin.php");


class Admin extends User
{
  public string $name;
  public string $email;
  protected string $password;

  public function __construct(
    string $name,
    string $email,
    string $password,
    ?int $id
  ) {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  public static function login(string $email, string $password): Admin | null
  {
    if (empty($email)) {
      error422("Enter Your Email");
    } elseif (empty($password)) {
      error422("Enter Your Password");
    } else {
      $email = trim(htmlspecialchars(filter_var($email, FILTER_SANITIZE_EMAIL)));
      $password = md5(htmlspecialchars($password));
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        error422("Invalid Email!");
      } else {
        $stuModel = new \model\Admin();
        $cols = ['email', 'password'];
        $vals = [$email, $password];
        $result = $stuModel->read($cols, $vals);
        $result = json_decode($result);
        $result = $result["data"];
        if (isset($result)) {
          if ($arr = mysqli_fetch_assoc($result)) {
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
    return null;
  }
}
