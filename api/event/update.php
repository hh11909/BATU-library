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
$title = mysqli_real_escape_string($conn, $title);
$start_date = mysqli_real_escape_string($conn, $start_date);
$end_date = mysqli_real_escape_string($conn, $end_date);
$content = mysqli_real_escape_string($conn, $content);
$state = mysqli_real_escape_string($conn, $state);
$query = "UPDATE events SET
            title='$title', 
            start_date='$start_date', 
            end_date='$end_date', 
            content='$content',
            state='$state'
            WHERE id='$event_id'";

if (mysqli_query($conn, $query)) {
    echo json_encode(["message" => "Event updated successfully"]);
} else {
    echo json_encode(["error" => "Error: " . mysqli_error($conn)]);
}
}
?>

