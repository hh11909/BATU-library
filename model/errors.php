<?php
function error422($message, $status = 422)
{
  $data = [
    'status' => $status,
    'Message' => $message
  ];

  header("HTTP/1.0 $status $message");
  header("X-Message: $message");
  return json_encode($data);
  exit();
}

 function error413($message){
  $data=[
    'status'=>413,
    'Message'=>$message 
   ];
   header("HTTP/1.1 413 Payload Entity Too Large");
   return json_encode($data);
  
  }
  ?>