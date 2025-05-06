<?php

namespace controller;

require("../model/errors.php");
require(__DIR__ . "/Student.php");
class Friend extends Student
{
  public $is_friend = 1;
}

