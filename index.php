<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";


var_dump($_SERVER["REQUEST_URI"]);
var_dump($_SERVER["REQUEST_METHOD"]);

$uri = $_SERVER["REQUEST_URI"];
$uri = explode(".", $uri);
$dir = scandir(__DIR__ . "/pages/");
var_dump($dir);
function view(string $uri)
{
  dir(__DIR__ . "/pages");
}
