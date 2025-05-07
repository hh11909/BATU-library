<?php
//Configrations of the header of the request
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");

function getData(): array | null
{
  $headers = getallheaders();
  $contentType = $headers['Content-Type'];
  $data = file_get_contents('php://input');
  switch ($contentType) {
    case 'application/json':
      return json_decode($data, true);
    case 'application/x-www-form-urlencoded':
      parse_str($data, $data);
      return $data;
  }
  return null;
}

