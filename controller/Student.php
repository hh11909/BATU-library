<?php
namespace controller;
use model\Student as StudentModel;

require_once(__DIR__ . "/../model/Student.php");
require_once(__DIR__ . "/User.php");
require_once(__DIR__ . "/../model/errors.php");

 class Student extends User {
    public $academy_number;
    public $phone;
    public $gender;
    public $department_ID;
    public $student_image;
    public $profile_image;
    public $is_friend=0;
    private $admin_ID;
    function __construct($name,$academy_number,$phone,$gender,$department_ID,$email,$is_friend,$admin_ID,$student_image=null,$profile_image=null,$id=null,$password=null){
      if($id!=null){
        $this->id=$id;
      }
      $this->role='student';
      $this->name=$name;
      $this->academy_number=$academy_number;
      $this->phone=$phone;
      $this->gender=$gender;
      $this->department_ID=$department_ID;
      $this->email=$email;
      $this->password=$password;
      $this->student_image=$student_image;
      $this->profile_image=$profile_image;
      $this->is_friend=$is_friend;
      $this->admin_ID=$admin_ID;

    }
    function setPassword($pass){
      $this->password=$pass;
    }
    function getPassword(){
      return $this->password;
    }
    function setAdmin_ID($admin_ID){
      $this->admin_ID=$admin_ID;
    }
    function getAdmin_ID(){
      return $this->admin_ID;
    }


    use BookFunctions{

      searchForBooks as public;
      readBooks as public;
      createBook as private;
      updateBook as private;
      deleteBook as private;
          
      }
      use StuBB;

    static function login($email,$password){
      $stuModel= new StudentModel();
      $cols=['email','password'];
      $vals=[$email,$password];
      $result=$stuModel->read($cols,$vals);
      $result=json_decode($result,true);
      if(is_array($result)){
        $result=$result["data"];
      }
      if(isset($result)){
        if($arr=$result[0]){
          switch ($arr['is_friend']) {
            case 0:
              $user= new Student($arr["name"],$arr["academy_number"],$arr["phone"],$arr["gender"],$arr["department_ID"],$arr["email"],$arr["is_friend"],$arr["admin_ID"],$arr["student_image"],$arr["profile_image"],$arr["student_ID"]);
              break;
              case 1:
              $user= new Friend($arr["name"],$arr["academy_number"],$arr["phone"],$arr["gender"],$arr["department_ID"],$arr["email"],$arr["is_friend"],$arr["admin_ID"],$arr["student_image"],$arr["profile_image"],$arr["student_ID"]);
              break;
          }
          return $user;
        }
      }
      else{
        return;
      }
          
    }


  

    //in Admin class+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    function storeStudent(Student $student){
      if(empty($student->name)){
        return error422("Enter student's name!");
      }
      elseif(empty($student->academy_number)){
        return error422("Enter student's academy number!"); 
      }
      elseif(empty($student->phone)){
        return error422("Enter student's phone!"); 
      }
      elseif(empty($student->gender)){
        return error422("Enter student's gender!");   
      }
      elseif(empty($student->department_ID)){
        return error422("Enter student's department ID!");   
      }
      elseif(empty($student->email)){
        return error422("Enter student's email!");   
      }
      elseif(empty($student->password)){
        return error422("Enter student's password!");   
      }
      elseif(empty($student->admin_ID)){
        return error422("Enter your admin ID!");   
      }
      else{
        $name = trim(filter_var($student->name,FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $academy_number =trim(htmlspecialchars(filter_var($student->academy_number,FILTER_SANITIZE_NUMBER_INT)));
        $phone=trim(htmlspecialchars(filter_var($student->phone,FILTER_SANITIZE_NUMBER_INT)));
        $gender=trim(filter_var($student->gender,FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $department_ID = htmlspecialchars(filter_var($student->department_ID,FILTER_SANITIZE_NUMBER_INT));
        $email = trim(htmlspecialchars(filter_var($student->email,FILTER_SANITIZE_EMAIL)));
        $password= md5(htmlspecialchars($student->password));
        $admin_ID=htmlspecialchars(filter_var($student->admin_ID,FILTER_SANITIZE_NUMBER_INT));
        $is_friend= htmlspecialchars(filter_var($student->is_friend,FILTER_SANITIZE_NUMBER_INT));
        if(!filter_var($student->email,FILTER_VALIDATE_EMAIL)){
          return error422("Invalid Email!"); 
        }
        elseif(filter_var($academy_number,FILTER_VALIDATE_INT)){
          return error422("Invalid Academy Number!");   
        }
        elseif(filter_var($phone,FILTER_VALIDATE_INT)){
          return error422("Invalid Academy Phone!");   
        }
        elseif(filter_var($department_ID,FILTER_VALIDATE_INT)){
          return error422("Invalid Academy Phone!");   
        }
        elseif(filter_var($admin_ID,FILTER_VALIDATE_INT)){
          return error422("Invalid Phone Number!");   
        }
        elseif(filter_var($is_friend,FILTER_VALIDATE_BOOLEAN)){
          return error422("Invalid Is_friend Bool Value!");   
        }
        else{
          $stu= new StudentModel();
          return $stu->create($name,$academy_number,$phone,$gender,$department_ID,$email,$password,$admin_ID,$is_friend);
        }
      }
    }

//in admin
use BookFunctions;
  }

?>