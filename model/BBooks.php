<?php
namespace model;  
require_once("Crud.php");
require_once("errors.php");
use model\Crud;

class BBooks{

private $table="Book_Request";
function read( $student_ID){
  $result = Crud::read($this->table,"student_ID",$student_ID);
  $result=json_decode($result,true);
  if (isset($result["data"])) {
     $result = $result["data"];
      $num=count($result);
      for($i=0; $i<$num;$i++){
        $id= $result[$i]["book_ID"];
        $res= Crud::read("Books","book_ID",$id);
        $data[]=$res;
        }
       
        
      
      }
      return $data ;
}
}
         
    
      

      ?>