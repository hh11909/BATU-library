<?php

use controller\Event;
session_start();
header("Content-Type:application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:POST");
header("Access-Control-Allow-Headers:Content-Type,Authorization,X-Request-With");
$requestMethod=$_SERVER["REQUEST_METHOD"];
$inputData= json_decode(file_get_contents("php://input"),true);
if($requestMethod=="POST"){
    $data = json_decode(file_get_contents("php://input"), true);
    
    $id = mysqli_real_escape_string($conn, $data['id']);
    
    $query = "UPDATE events SET state='expired' WHERE event_id='$event_id'";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(["message" => "Event expired successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . mysqli_error($conn)]);
    }
}
    ?>
    
