<?php
namespace model;  
require_once("Crud.php");
require_once("errors.php");
use model\Crud;

class BBooks{

private $table="Book_Request";
function read( $academy_number){
  $result = Crud::read($this->table,"academy_number",$academy_number);
  $result=json_decode($result,true);
  if(is_array($result)){
    $result=$result["data"]; 
}
    if(isset($result)){
      if($arr=$result[0]){
      $id=$arr['book_ID'];
 return Crud::read("Books","book_ID",$id);
 }}
  }
  
    }
      

      ?>