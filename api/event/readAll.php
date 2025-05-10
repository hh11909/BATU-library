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
    $query = "SELECT * FROM events WHERE state IN ('available', 'expired') 
    ORDER BY FIELD(state, 'available', 'expired'), date ASC";
$result = mysqli_query($conn, $query);
$events = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }
}
echo json_encode($events);
}
?>

