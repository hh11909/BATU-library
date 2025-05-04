<?php
  namespace model;  
  class Crud{
    static function create($tableName,$cols,$vals){
      require('dbcon.php');

      $qry= "INSERT INTO $tableName (";
      
      foreach($cols as $col){
        $qry=$qry."$col,";
      }
      $qry=substr($qry,0,-1);    
      $qry=$qry.") VALUES (";
      foreach($vals as $val){
        $qry=$qry."$val,";
      }
      $qry=substr($qry,0,-1);
      $qry=$qry.");";   
      $result= mysqli_query($cn,$qry);
      if($result){
          $data=[
            'status'=>201,
            'Message'=> "Created Successfully" 
          ];
          mysqli_close($cn);
          header("HTTP/1.0 201 Created");
          return json_encode($data);
      }
      else{
        $data=[
          'status'=>500,
          'Message'=> "Internal Server Error" 
        ];
        mysqli_close($cn);
         header("HTTP/1.0 500 Internal Server Error");
         return json_encode($data);
      }
    }
    static function read($tableName,$filterCols=array(),$filterVals=array()){
      require('dbcon.php');
      $qry= "SELECT * from $tableName;";
      if(!empty($filterCols)&&!empty($filterVals)){
        $qry= substr($qry,0,-1); 
        $filter=" WHERE ";
        for($i=0;$i<count($filterCols);$i++){
          $filter=$filter.$filterCols[$i]." LIKE '%".$filterVals[$i]."%' AND ";
        }
        $filter=substr($filter,0,-4);
        $qry=$qry.$filter.";";
      }

      $qry_run= mysqli_query($cn,$qry);
      if($qry_run){
        if(mysqli_num_rows($qry_run)>0){
          $res= mysqli_fetch_all($qry_run,MYSQLI_ASSOC);
          $data=[
            'status'=>200,
            'Message'=> "Found Successfully" ,
            'data'=> $res
          ];
          mysqli_close($cn);
          header("HTTP/1.0 200 OK");
          return json_encode($data);
        }
        else{
          $data=[
            'status'=>404,
            'Message'=> "Not Found" 
           ];
           mysqli_close($cn);
           header("HTTP/1.0 404 Not Found");
          //  return json_encode($data);
        }
      }
    }
    static function update($tableName,$updateCols=array(),$updateVals=array(),$filterCols=array(),$filterVals=array()){
      require('dbcon.php');
      $qry= "UPDATE $tableName SET ";
      $update="";
      $filter="";
      if(!empty($updateCols)&&!empty($updateVals)){
        for($i=0;$i<count($updateCols);$i++){
          $update=$update.$updateCols[$i]." = '".$updateVals[$i]."' ,";
        }
        $update=substr($update,0,-1);
        $qry=$qry.$update.";";
        if(!empty($filterCols)&&!empty($filterVals)){
          $qry=substr($qry,0,-1);
          $qry=$qry."WHERE ";
          for($i=0;$i<count($filterCols);$i++){
            $filter=$filter.$filterCols[$i]." = '".$filterVals[$i]."' &&";
          }
          $filter=substr($filter,0,-2);
          $qry=$qry.$filter.";";
        }
      } 
      $result= mysqli_query($cn,$qry);
      if($result){
        $data=[
          'status'=>200,
          'Message'=> "Updated Successfully" 
        ];
        mysqli_close($cn);
        header("HTTP/1.0 200 OK");
        return json_encode($data);
      }
      else{
        $data=[
          'status'=>500,
          'Message'=> "Internal Server Error" 
        ];
        mysqli_close($cn);
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
      }
    }
    static function delete($tableName,$filterCols=array(),$filterVals=array()){
      require('dbcon.php');
      $qry= "DELETE FROM $tableName;";
      if(!empty($filterCols)&&!empty($filterVals)){
        $qry= substr($qry,0,-1); 
        $filter=" WHERE ";
        for($i=0;$i<count($filterCols);$i++){
          $filter=$filter.$filterCols[$i]." = '".$filterVals[$i]."' AND ";
        }
        $filter=substr($filter,0,-4);
        $qry=$qry.$filter."LIMIT 1;";
      }
      $result= mysqli_query($cn,$qry);
      if($result){
        $data=[
          'status'=>200,
          'Message'=> "Deleted Successfully" 
        ];
        mysqli_close($cn);
        header("HTTP/1.0 200 OK");
        return json_encode($data);
      }
      else{
        $data=[
          'status'=>404,
          'Message'=> "Not Found" 
        ];
        mysqli_close($cn);
        header("HTTP/1.0 404 Not Found");
        return json_encode($data);
      }
    }
}
