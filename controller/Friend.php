<?php

namespace controller;

require_once(__DIR__ . "/../model/errors.php"); // Ensure this file exists and the path is correct
if (!file_exists(__DIR__ . "/../model/errors.php")) {
    throw new \Exception("Required file errors.php not found.");
}
require_once(__DIR__ . "/Student.php");

class Friend extends Student
{
  public $is_friend = 1;
  
}
