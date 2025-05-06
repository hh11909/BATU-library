<?php
function error422($message)
{
  $data = [
    'status' => 422,
    'Message' => $message
  ];
  header("HTTP/1.0 422 Unprocessible Entity");
  header("X-Message: $message");
  return json_encode($data);
  exit();
}
