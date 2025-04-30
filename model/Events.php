<?php
namespace model;  
require_once("Crud.php");
require_once("errors.php");
use model\Crud;
class Events{
    private $table="Events";
    private $fields=["title","content","image","date","state","admin_ID",];
    function create($title,$content,$image,$date,$state=["requested","available","expired"],$admin_ID){

        if(empty(trim($title))){
            return error422("Enter Event's title!");
          }
          elseif(empty(trim($content))){
            return error422("Enter Event's content!"); 
          }
          elseif(empty($image)){
            return error422("Enter Event's your image"); 
          }
          elseif(empty(trim($date))){
            return error422("Enter Event's date");   
          }
          elseif(empty(trim($state))){
            return error422("Enter Event state!");   
          }
          elseif(empty(trim($admin_ID))){
            return error422("Enter your admin ID!");   
          }
         
          else{
            $title = trim(filter_var($title,FILTER_SANITIZE_STRING));
            $content =trim(htmlspecialchars(filter_var($content,FILTER_SANITIZE_STRING)));
            // $image =trim(htmlspecialchars(filter_var($image,FILTER_SANITIZE_FULL_SPECIAL_CHARS)));   
            $state=trim(filter_var($state,FILTER_SANITIZE_STRING));
            $admin_ID=htmlspecialchars(filter_var($admin_ID,FILTER_SANITIZE_NUMBER_INT));
            if(is_string($title) && trim($title) !== ''){
              return error422("empty input!");
            }
            elseif(is_string($content) && trim($content) !== ''){
              return error422("empty input!");
            }
            elseif (!in_array($state, $validStates)) {
              return error422("Invalid STATE!");
          }
            elseif(filter_var($admin_ID,FILTER_VALIDATE_INT)){
              return error422("Invalid Admin ID !");   
            }
            else{
              $vals=[$title,$content,$image,$date,$state,$admin_ID];
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