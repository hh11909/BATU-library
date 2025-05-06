<?php
use controller\Admin;
require_once("../../controller/Admin.php");
 session_start();
  // header("Content-Type:application/json");
  header("Access-Control-Allow-Origin:*");
  header("Access-Control-Allow-Methods:POST");
  header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
  $requestMethod=$_SERVER["REQUEST_METHOD"];
  $inputData= json_decode(file_get_contents("php://input"),true);
  if($requestMethod=="POST"){
    if (isset($inputData["name"]) && isset($inputData["author"])&&isset($inputData["image"]) && isset($inputData["description"]) && isset($inputData["admin_ID"])&& isset($inputData["Uname"]) || isset($inputData["Uauthor"])||isset($inputData["Uimage"]) ||isset($inputData["Udescription"]) || isset($inputData["Uadmin_ID"])){
      $book= Admin::updateBook($inputData["name"] , $inputData["author"] ,  $inputData["image"] ,$inputData["description"] ,  $inputData["admin_ID"],$inputData["Uname"] ,$inputData["Uauthor"],$inputData["Uimage"],$inputData["Udescription"],$inputData["Uadmin_ID"]);
      $_SESSION["update_book"]=serialize($book);
      header("Location:../../pages/Explore.html");
    }
    else{
        $message=json_decode($book);
        echo $message->Message;
    }}
     else{
    $data=[
     'status'=>405,
     'Message'=>$requestMethod." Method Not Allowed" 
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
  }
?>