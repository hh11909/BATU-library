<?php

require_once("../../vendor/autoload.php");
require_once("../src.php");

use controller\Admin;

describe("Controller Admin", function () {
  it("login", function () {
    $email = "admin@amr.com";
    $password = "1234";
    $model = Admin::login($email, $password);
    return $model->to_json();
  });
});
