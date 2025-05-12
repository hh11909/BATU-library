<?php

namespace controller;

require_once(__DIR__ . "/../model/errors.php");
require_once(__DIR__ . "/Student.php");
use controller\Student;
class Friend extends Student
{
  public $is_friend = 1;
}
