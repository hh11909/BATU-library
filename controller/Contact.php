<?php

namespace controller;

require_once __DIR__ . '/../model/Contact.php';
require_once __DIR__ . '/../model/errors.php';


class Contact
{
  public string $name;
  public string $email;
  public string $message;
  public ?int $student_ID = null;


  public function __construct(string $name, string $email, string $message,)
  {
    $this->name = $name;
    $this->email = $email;
    $this->message = $message;
    $this->validate();
    $this->sanitize();
  }
  public function setStudent_ID(int $id)
  {
    $this->student_ID = $id;
  }
  public function sanitize()
  {
    $this->name = trim(filter_var($this->name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $this->email = trim(htmlspecialchars(filter_var($this->email, FILTER_SANITIZE_EMAIL)));
    $this->message = htmlspecialchars(filter_var($this->message, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  }
  public function validate()
  {

    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      return error422("Invalid Email!");
    } elseif (!filter_var($this->name, FILTER_DEFAULT)) {
      return error422("Invalid Name");
    } elseif (!filter_var($this->message, FILTER_DEFAULT)) {
      return error422("Invalid Message");
    }
    return true;
  }

  public function create()
  {
    $model = new \model\Contact();
    $result = $model->create($this);
    return $result;
  }
  /** 
   * @param ?int $id
   * */
  public static function read($id)
  {
    $cols = [];
    $vals = [];
    if ($id) {
      $cols = ['contact_ID'];
      $vals = [$id];
    }
    $model = new \model\Contact();
    $result = $model->read($cols, $vals);
    return $result;
  }
  /**
   * @param ?int  $id
   * */
  public static function delete($id)
  {
    if ($id) {
      $cols = ['contact_ID'];
      $vals = [$id];
      $model = new \model\Contact();
      $result = $model->delete($cols, $vals);
      return $result;
    }
    error422("Bad Request", 400);
  }
}
