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
    default:
      $boundary = substr($data, 0, strpos($data, "\r\n"));
      $parts = array_slice(explode($boundary, $data), 1);
      $_data = [];
      foreach ($parts as $part) {
        if ($part == "--\r\n") break;

        $part = ltrim($part, "\r\n");
        list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);

        $raw_headers = explode("\r\n", $raw_headers);
        $headers = array();
        foreach ($raw_headers as $header) {
          list($name, $value) = explode(':', $header);
          $headers[strtolower($name)] = ltrim($value, ' ');
        }

        if (isset($headers['content-disposition'])) {
          $filename = null;
          preg_match(
            '/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/',
            $headers['content-disposition'],
            $matches
          );
          list(, $type, $name) = $matches;
          isset($matches[4]) and $filename = $matches[4];
          // handle your fields here
          if ($filename) {
            // This is a file
            $tempPath = tempnam(sys_get_temp_dir(), 'php_put_file_');
            file_put_contents($tempPath, $body);

            $fileType = $headers['content-type'] ?? 'application/octet-stream';

            $_data[$name] = [
              'name' => $filename,
              'type' => $fileType,
              'tmp_name' => $tempPath,
              'error' => 0,
              'size' => strlen($body),
            ];
          } else {
            $_data[$name] = substr($body, 0, strlen($body) - 2);
          }
        }
      }
      return $_data;
  }
  return null;
}
