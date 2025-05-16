<?php

session_start();
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once(__DIR__ . '/../../model/errors.php');
require_once(__DIR__ . '/../../controller/Contact.php');
require_once(__DIR__ . '/../../controller/Admin.php');
require_once(__DIR__ . '/../../controller/Student.php');
require_once(__DIR__ . '/../../controller/Friend.php');
require_once(__DIR__ . '/../../controller/User.php');

use controller\Contact;
use controller\Admin;
use controller\Student;
use controller\Friend;
use controller\User;






if (isset($_SESSION['user'])) {
  /**@var Student | Admin | Friend $user */
  $user = unserialize($_SESSION['user']);
  if ($user instanceof Admin) {
    error422("Admin cannot create contact", 400);
    die();
  }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $message = $_POST['message'];
  if ($user) {
    $name = $user->name;
    $email = $user->email;
  } else {
    $name = $_POST['name'];
    $email = $_POST['email'];
  }
  $contact = new Contact($name, $email, $message);
  if ($user) {
    echo $user->createMessage($contact);
  } else {
    echo $contact->create();
  }
  die();
}
error422('Bad Request', 400);
