<?php

// header("Content-Type:application/json");
// header("Access-Control-Allow-Origin:*");
// header("Access-Control-Allow-Methods:GET");
// header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");

// use model\Student;
// require_once("Student.php");
// $x= new Student();
// // echo $x->create("mohamed","2320486","01200333333","male",1,"aaaa@gmail.com","pass",1);
// // $qry="select * from students;";
// // $cn= mysqli_connect("localhost","root","","library");
// // $res= mysqli_query($cn,$qry);
// // $arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
// // var_dump($arr);
// echo $x->read();
// // echo Crud::read("students");
$query="select * from employees;";
$cn= mysqli_connect("localhost","root","","test");
$result=mysqli_query($cn,$query);
$res=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo "<pre>";
var_dump($res);
echo "</pre>";

?>