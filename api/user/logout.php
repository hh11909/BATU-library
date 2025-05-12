<?php
  session_start();
  session_unset();
  setcookie("user","",time()-60,"/");
  header("location:../../pages/login.php");
?>