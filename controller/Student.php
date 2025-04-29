<?php
namespace controller;
use model;
require("../model/errors");
class Student{
    public $student_ID;
    public $name;
    public $academy_number;
    public $phone;
    public $gender;
    public $department_ID;
    public $email;
    private $password;
    public $student_image;
    public $profile_image;
    public $is_friend=0;
    private $admin_ID;
    public $created_at;
    public $updated_at;
    function __construct($student_ID,$name,$academy_number,$phone,$gender,$departmentID,$email,$password,$student_image=null,$profile_image=null,$is_friend,$admin_ID,$created_at,$updated_at)
    {
      $this->student_ID=$student_ID;
      $this->name=$name;
      $this->academy_number=$academy_number;
      $this->phone=$phone;
      $this->gender=$gender;
      $this->department_ID=$departmentID;
      $this->email=$email;
      $this->password=$password;
      $this->student_image=$student_image;
      $this->profile_image=$profile_image;
      $this->is_friend=$is_friend;
      $this->admin_ID=$admin_ID;
      $this->created_at=$created_at;
      $this->updated_at=$updated_at;
    }

    function setPassword($pass){
      $this->password=$pass;
    }
    function setAdmin_ID($admin_ID){
      $this->admin_ID=$admin_ID;
    }
    function getAdmin_ID(){
      return $this->admin_ID;
    }

    static function login($email,$password){
      if(empty($email)){
        error422("Enter Your Email");
      }
      elseif(empty($password)){
        error422("Enter Your Password");
      }
      else{
        $email=trim(htmlspecialchars(filter_var($email,FILTER_SANITIZE_EMAIL)));
        $password= md5(htmlspecialchars($password));
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
          error422("Invalid Email!");
        }
        else{
          $stuModel= new model\Student();
          $cols=['email','password'];
          $vals=[$email,$password];
          $result=$stuModel->read($cols,$vals);
          $result=json_decode($result);
          $result=$result["data"];
          if(isset($result)){
            if($arr=mysqli_fetch_assoc($result)){
              switch($arr["is_friend"]){
                case 0:
                  $user= new Student($arr["student_id"],$arr["name"],$arr["academy_number"],$arr["phone"],$arr["gender"],$arr["department"],$arr["email"],$arr["password"],$arr["student_image"],$arr["profile_image"],$arr["is_friend"],$arr["admin_ID"],$arr["created_at"],$arr["updated_at"]);
                  break;
                  case 1:
                  $user= new Friend($arr["student_id"],$arr["name"],$arr["academy_number"],$arr["phone"],$arr["gender"],$arr["department"],$arr["email"],$arr["password"],$arr["student_image"],$arr["profile_image"],$arr["is_friend"],$arr["admin_ID"],$arr["created_at"],$arr["updated_at"]);
                  break;
              }
              return $user;
            }
          }
          
        }
      }
    }
}
class Friend extends Student{
  
}
?>