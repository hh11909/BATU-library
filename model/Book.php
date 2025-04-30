<?php
namespace model;  
require_once("Crud.php");
require_once("errors.php");
use model\Crud;
class Book{

    private $table="Books";
    private $fields=["name","author","image","description","admin_ID","s_borrowed =0"];
     function create($name,$author,$image,$description,$admin_ID,$is_friend=0){
      if(empty(trim($name))){
          return error422("Enter book name!");
        }
        elseif(empty(trim($author))){
          return error422("Enter auther name!"); 
        }
        elseif(empty(trim($description))){
          return error422("Enter book description!");   
        }
           elseif(empty(trim($admin_ID))){
          return error422("Enter your ID!");   
        }
          elseif (!isset($_FILES['book_image']) || $_FILES['book_image']['error'] === UPLOAD_ERR_NO_FILE) {
      return error422(" upload a book image!");
    }
        else{
          $name = trim(filter_var($name,FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $author = trim(filter_var($author,FILTER_SANITIZE_FULL_SPECIAL_CHARS));
          $description=trim(filter_var($description,FILTER_SANITIZE_FULL_SPECIAL_CHARS));
          $admin_ID=htmlspecialchars(filter_var($admin_ID,FILTER_SANITIZE_NUMBER_INT));
          $image_name = $_FILES['book_image']['name'];       
          $image_tmp  = $_FILES['book_image']['tmp_name'];        
          $image_size = $_FILES['book_image']['size'];           
          $image_ext  = strtolower(pathinfo($image_name, PATHINFO_EXTENSION)); 
          $allowed_ext = ['jpg', 'jpeg', 'png'];  
          $filterCols=["name","author"];
        $filterVals=[$name,$author];
          $ex_book=  Crud::read($this->table,$filterCols,$filterVals);
          json_decode($ex_book, true); 
          if(filter_var($admin_ID,FILTER_VALIDATE_INT)){
            return error422("Invalid ID!");   
          }                                     
elseif (!in_array($image_ext, $allowed_ext)) {
         return error422("Invalid Image extension , please enter: file.jpg /file.jpeg /file.png !");   
        }
   elseif ($image_size > 2 * 1024 * 1024) {
        return error413("Image size should not exceed 2MB.");
       }  
       elseif ($ex_book['status'] === 200) {
        return json_encode([
            'status' => 400,
            'Message' => 'The book already exists in the database.'
        ]);
    }   
          else{$new_image= uniqid("book_", true) . '.' . $image_ext;
move_uploaded_file($image_tmp, "../bookImages" . $new_image);
            $vals=[$name,$author,$new_image, $description,$admin_ID];
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