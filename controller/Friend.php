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
      return $result;
    }
    return error422('Bad Request', 400);
  }
  /**
   *@param ?int | ?int[] $id
   */
  public function readEvent($id)
  {
    $cols = [];
    $vals = [];
    $model = new \model\Event();
    if (is_array($id)) {
      $data = [];
      $status = 0;
      for ($i = 0; $i < count($id); $i++) {
        $cols = ['event_ID'];
        $vals = [$id[$i]];
        $result = $model->read($cols, $vals);
        $status = $result['status'];
        $result = json_decode($result);
        if (!empty($result['data']) && $result['data']) {
          array_push($data, $result['data']);
        }
      }
      if ($status == 0) {
        $status = 200;
      }
      return json_encode([
        "status" => $status,
        "data" => $data
      ]);
    } else {
      if ($id) {
        $cols = ['event_ID'];
        $vals = [$id];
      }
      $result = $model->read($cols, $vals);
      return $result;
    }
  }
  public function updateEvent(array $values, int $event_ID)
  {
    if (!empty($values) && $event_ID) {
      $model = new \model\Event();
      $result = $model->read(['event_ID'], [$event_ID]);
      $result = json_decode($result, true);
      if ($result['data'][0]['admin_ID'] != null || $result['data'][0]['student_ID'] !== $this->id) {
        error422('Unauthorized', 403);
        die();
      }
      $keys = array_keys($values);
      $vals = array_values($values);
      $filterKeys = ['student_ID', 'event_ID'];
      $filterVals = [$this->id, $event_ID];
      $result = $model->update($keys, $vals, $filterKeys, $filterVals);
      return $result;
    } else {
      return error422('Bad Request', 400);
    }
  }
  public function deleteEvent(int $id)
  {
    if ($id) {
      $model = new \model\Event();
      $result = $model->read(['event_ID'], [$id]);
      $result = json_decode($result, true);
      if ($result['data'][0]['admin_ID'] != null || $result['data'][0]['student_ID'] !== $this->id) {
        error422('Unauthorized', 403);
        die();
      }
      $keys = ['event_ID', 'student_ID'];
      $vals = [$id, $this->id];
      $result = $model->delete($keys, $vals);
      return $result;
    } else {
      error422('Bad Request', 400);
    }
  }
}
