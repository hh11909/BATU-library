<?php
namespace model;  
require_once("Crud.php");
require_once("errors.php");
use model\Crud;
class Student{
  
    private $table="Students";
    private $fields=["name","academy_number","phone","gender","department_ID","email","password","admin_ID","is_friend"];//,"student_image","profile_image","is_friend", //with update
    
     function create($name,$academy_number,$phone,$gender,$department_ID,$email,$password,$admin_ID,$is_friend=0){
      require('dbcon.php');
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
          $name = trim(filter_var($name,FILTER_SANITIZE_FULL_SPECIAL_CHARS));
          $academy_number =trim(htmlspecialchars(filter_var($academy_number,FILTER_SANITIZE_NUMBER_INT)));
          $phone=trim(htmlspecialchars(filter_var($phone,FILTER_SANITIZE_NUMBER_INT)));
          $gender=trim(filter_var($gender,FILTER_SANITIZE_FULL_SPECIAL_CHARS));
          $department_ID = htmlspecialchars(filter_var($academy_number,FILTER_SANITIZE_NUMBER_INT));
          $email = trim(htmlspecialchars(filter_var($email,FILTER_SANITIZE_EMAIL)));
          $password= md5(htmlspecialchars($password));
          $admin_ID=htmlspecialchars(filter_var($admin_ID,FILTER_SANITIZE_NUMBER_INT));
          $is_friend= htmlspecialchars(filter_var($is_friend,FILTER_SANITIZE_NUMBER_INT));
          if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return error422("Enter Validate Email!");   
          }
          elseif(filter_var($academy_number,FILTER_VALIDATE_INT)){
            return error422("Enter Validate academy number!");   
          }
          elseif(filter_var($phone,FILTER_VALIDATE_INT)){
            return error422("Enter Validate academy phone!");   
          }
          elseif(filter_var($department_ID,FILTER_VALIDATE_INT)){
            return error422("Enter Validate academy phone!");   
          }
          elseif(filter_var($admin_ID,FILTER_VALIDATE_INT)){
            return error422("Enter Validate academy phone!");   
          }
          elseif(filter_var($is_friend,FILTER_VALIDATE_BOOLEAN)){
            return error422("Enter Validate academy phone!");   
          }
          else{
            $vals=[$name,$academy_number,$phone,$gender,$department_ID,$email,$password,$admin_ID,$is_friend];
            return Crud::create($this->table,$this->fields,$vals);
          }
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