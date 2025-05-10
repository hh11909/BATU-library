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

// $new_event=new Event();
// Admin :: createEvent( Event $new_event,$role,$admin_ID)
// {
// $role= "admin";
// $new_event->create($role)
// }
$data = json_decode(file_get_contents("php://input"), true);
$title = mysqli_real_escape_string($conn, $data['title']);
$start_date = mysqli_real_escape_string($conn, $data['start_date']);
$end_date = mysqli_real_escape_string($conn, $data['end_date']);
$content = mysqli_real_escape_string($conn, $data['content']);
if ($role == 'admin' || $role == 'friend') {
    $state = 'available';
} else {
    $state = 'requested';
$query = "INSERT INTO events (title, start_date, end_date, content, state)
          VALUES ('$title', '$start_date', '$end_date', '$content', $state)";
if (mysqli_query($conn, $query)) {
    echo json_encode(["message" => "Event created successfully"]);
} else {
    echo json_encode(["error" => "Error: " . mysqli_error($conn)]);
}
}
}
?>
