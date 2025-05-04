<?php
require_once("../../controller/User.php");
use controller\User;
  session_start();
  // header("Content-Type:application/json");
  header("Access-Control-Allow-Origin:*");
  header("Access-Control-Allow-Methods:POST");
  header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
  $requestMethod=$_SERVER["REQUEST_METHOD"];
  $inputData= json_decode(file_get_contents("php://input"),true);
  if($requestMethod=="POST"){
    if(isset($_POST["email"])&&isset($_POST["password"])){
      $user= User::login($_POST["email"],$_POST["password"]);
      if(isset($user->role)){
        if($user->role=="student"){
          $_SESSION["user"]=serialize($user);
          header("Location:../../pages/index.html");
        }
        elseif($user->role=="admin"){
          $_SESSION["user"]=serialize($user);
          header("Location:../../pages/dashboard.html");
        }
      }
      else{
        $message=json_decode($user);
        echo $message->Message;
      }
    }
    else{
      $userList;
      echo $userList;
    }
  }
  else{
    $data=[
     'status'=>405,
     'Message'=>$requestMethod." Method Not Allowed" 
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
  }
?>