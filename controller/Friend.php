<?php

namespace controller;

require_once(__DIR__ . '/Event.php');
require_once(__DIR__ . "/../model/errors.php");
require_once(__DIR__ . "/Student.php");

use controller\Student;
use controller\Event;

class Friend extends Student
{
  public $is_friend = 1;

  public function createEvent(Event $event)
  {
    if ($event) {
      $model = new \model\Event();
      $result = $model->create($event);
      $status = $result['status'];
      $result = $result['data'];
      if ($result) {
        return json_encode([
          'status' => $status
        ]);
      }
      return error422('Server Error', 500);
    }
    return error422('Bad Request', 400);
  }
}
