<?php

namespace model;

require_once("Crud.php");
require_once("errors.php");

use model\Crud;

class BBooks
{

  private $table = "book_requests";
  function read($student_ID)
  {
    $result = Crud::read($this->table, ["student_ID"], [$student_ID]);
    $result = json_decode($result, true);
    $data=[];
    if (isset($result["data"])) {
      $result = $result["data"];
      $num = count($result);
      for ($i = 0; $i < $num; $i++) {
        $id = $result[$i]["book_ID"];
        $res = json_decode(Crud::read("Books", ["book_ID"], [$id]),true); 
        $res=$res["data"][$i];
        $res["borrow_date"] = $result[$i]["borrow_date"];   
        $res["return_date"] = $result[$i]["return_date"]; 
        $res["request_time"] = $result[$i]["created_at"]; 
        array_push($data,$res);
      }
      $result=[
        'status'=>200,
        'Message'=>"OK",
        "data"=>$data
      ];
      return json_encode($result);
    }
  }
}
