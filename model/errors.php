<?php
function error422($message){
$data=[
  'status'=>422,
  'Message'=>$message 
 ];
 header("HTTP/1.0 422 Unprocessible Entity");
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