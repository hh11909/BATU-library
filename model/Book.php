<?php
namespace model;  
require_once("Crud.php");
require_once("errors.php");
use model\Crud;
class Book{

    private $table="Books";
    private $fields=["name","author","image","description","admin_ID","is_borrowed"];
     function create($name,$author,$image,$description,$admin_ID,$is_borrowed=0){
              $vals=[$name,$author,$image, $description,$admin_ID];
            return Crud::create($this->table,$this->fields,$vals);
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