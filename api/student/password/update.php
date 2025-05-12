  <?php
    require_once(__DIR__."/../../../controller/Student.php");
    use controller\Student;
    require_once(__DIR__."/../../../model/errors.php");
    header("Content-Type:application/json");
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Methods:PUT");
    header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
    session_start();
    $requestMethod=$_SERVER["REQUEST_METHOD"];
    if($requestMethod=="PUT"){
      $inputData= json_decode(file_get_contents("php://input"),true);
      if(!isset($_SESSION["user"])){
        echo error422("Unauthorized", 401);
      }
      else{
        /**@var Student $user */
        $user=unserialize($_SESSION["user"]);
        if($user->getPassword()!=(md5(htmlspecialchars($inputData["cup"])))){
          echo error422("please enter invalid password!",422);
        }
        elseif($inputData["np"]!=$inputData["cop"]){
          error422("new and confirm password are not the same!",422);
          
        }
        else{
          $user->updatePassword($inputData["np"]);
          $_SESSION["user"]=serialize($user);
          $data=[
            'status'=>200,
            'Message'=>"Password updated successfully!"
           ];
           header("HTTP/1.0 200 ok");
           echo json_encode($data);
        }
      }
      
      
    }
    else{
      $data=[
       'status'=>405,
       'Message'=>$requestMethod." Method Not Allowed" 
      ];
      header("HTTP/1.0 405 Method Not Allowed");
      echo json_encode($data);
    }
?>