<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";

use Model\Admin;

var_dump($_SERVER["REQUEST_URI"]);
var_dump($_SERVER["REQUEST_METHOD"]);
$_COOKIE["NAME"] = "ss";
var_dump($_COOKIE);
