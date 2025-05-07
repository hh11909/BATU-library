<?php
function error422($message, $status = 422)
{
  $data = [
    'status' => 422,
    'Message' => $message
  ];

  header("HTTP/1.0 $status $message");
  header("X-Message: $message");
  return json_encode($data);
  exit();
}
