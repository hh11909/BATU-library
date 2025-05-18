<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");

if($_SESSION["role"]=="student"){
  require_once(__DIR__ . "/../controller/Student.php");
  /**@var Student $user */
  $user = unserialize($_SESSION["user"]);
  $data=[
    "status"=>200,
    "message"=>"OK",
    "data"=>$user
  ];
  echo $user;

  }
  elseif($_SESSION["role"]=="friend"){
    require_once(__DIR__ . "/../controller/Friend.php");
    /**@var Friend $user */
    $user = unserialize($_SESSION["user"]);
    $data=[
      "status"=>200,
      "message"=>"OK",
      "data"=>$user
    ];
    echo $user;
  }
  elseif($_SESSION["role"]=="admin"){  
    /**@var Friend $user */
    $user = unserialize($_SESSION["user"]);
    $data=[
      "status"=>200,
      "message"=>"OK",
      "data"=>$user
    ];
    echo $user;
  }
  ?>