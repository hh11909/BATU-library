<?php
namespace model;  
require_once("Crud.php");
require_once("errors.php");
use model\Crud;
class Student{
    // public $student_ID;
    // public $name;
    // public $academy_number;
    // public $phone;
    // public $gender;
    // public $department_ID;
    // public $email;
    // private $password;
    // public $student_image;
    // public $profile_image;
    // public $is_friend=0;
    // public $admin_ID;
    // public $created_at;
    // public $updated_at;
    private $table="Students";
    private $fields=["name","academy_number","phone","gender","department_ID","email","password","admin_ID","is_friend"];//,"student_image","profile_image","is_friend", //with update
    // function __construct($student_ID=null,$name=null,$academy_number=null,$phone=null,$gender=null,$departmentID=null,$email=null,$password=null,$student_image=null,$profile_image=null,$is_friend=null,$admin_ID=null,$created_at=null,$updated_at=null)
    // {
    //   $this->student_ID=$student_ID;
    //   $this->name=$name;
    //   $this->academy_number=$academy_number;
    //   $this->phone=$phone;
    //   $this->gender=$gender;
    //   $this->department_ID=$departmentID;
    //   $this->email=$email;
    //   $this->password=$password;
    //   $this->student_image=$student_image;
    //   $this->profile_image=$profile_image;
    //   $this->is_friend=$is_friend;
    //   $this->admin_ID=$admin_ID;
    //   $this->created_at=$created_at;
    //   $this->updated_at=$updated_at;
    // }
        function create($name,$academy_number,$phone,$gender,$department_ID,$email,$password,$admin_ID,$is_friend=0){
        require('dbcon.php');
        $name = htmlspecialchars($name);
        $academy_number =htmlspecialchars(filter_var($academy_number,FILTER_SANITIZE_NUMBER_INT));
        $phone=htmlspecialchars($phone);
        $gender=htmlspecialchars($gender);
        $department_ID = htmlspecialchars(filter_var($academy_number,FILTER_SANITIZE_NUMBER_INT));
        $email = htmlspecialchars(filter_var($email,FILTER_SANITIZE_EMAIL));
        $password= htmlspecialchars(md5($password));
        $admin_ID=htmlspecialchars(filter_var($admin_ID,FILTER_SANITIZE_NUMBER_INT));
        $is_friend= htmlspecialchars(filter_var($is_friend,FILTER_SANITIZE_NUMBER_INT));
        if(empty(trim($name))){
            return error422("Enter student's name!");
          }
          elseif(empty(trim($academy_number))){
            return error422("Enter student's academy number!"); 
          }
          elseif(empty($phone)){
            return error422("Enter student's phone!"); 
          }
          elseif(empty(trim($gender))){
            return error422("Enter student's gender!");   
          }
          elseif(empty(trim($department_ID))){
            return error422("Enter student's department ID!");   
          }
          elseif(empty(trim($email))){
            return error422("Enter student's email!");   
          }
          elseif(empty(trim($password))){
            return error422("Enter student's password!");   
          }
          elseif(empty(trim($adminID))){
            return error422("Enter your admin ID!");   
          }
          else{
              $vals=[$name,$academy_number,$phone,$gender,$department_ID,$email,$password,$admin_ID,$is_friend];
              return Crud::create($this->table,$this->fields,$vals);
          }
     }
     function read($filterCols=array(),$filterVals=array()){
         if(empty($filterCols)&&empty($filterVals)){
             return Crud::read($this->table);
         }
        elseif(count($filterCols)==count($filterVals) && (!empty($filterCols)&&!empty($filterVals))){
            return Crud::read($this->table,$filterCols,$filterVals);
        }
        elseif(count($filterCols)!=count($filterVals)){
            return error422('filteration columns count are not equal to their values count!');
        }
     }
     function update($updateCols=array(),$updateVals=array(),$filterCols=array(),$filterVals=array()){
        if(count($updateCols)==count($updateVals)&&(!empty($updateCols)&&!empty($updateVals))){
            if(empty($filterCols)&&empty($filterVals)){
                return Crud::update($this->table,$updateCols,$updateVals);
            }
            elseif(count($filterCols)==count($filterVals) && (!empty($filterCols)&&!empty($filterVals))){
                return Crud::update($this->table,$updateCols,$updateVals,$filterCols,$filterVals);
            }
            elseif(count($filterCols)!=count($filterVals)){
                return error422('filteration columns count are not equal to their values count!');
            }
        }
        elseif (empty($updateCols)||empty($updateVals)){
            return error422('update columns or values are empty');
        }       
     }
     function delete($filterCols=array(),$filterVals=array()){
      if(empty($filterCols)&&empty($filterVals)){
        return Crud::delete($this->table);
      }
      elseif(count($filterCols)==count($filterVals) && (!empty($filterCols)&&!empty($filterVals))){
        return Crud::delete($this->table,$filterCols,$filterVals);
      }
      elseif(count($filterCols)!=count($filterVals)){
        return error422('filteration columns count are not equal to their values count!');
      }
      
     }
}
     
    
    
   

?>