<?php
require_once("./config.php");
$cn= mysqli_connect(DB_HOST_NAME,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
if(!$cn){
  die("connection faild: ".mysqli_connect_error());
  mysqli_close($cn);
}

?>