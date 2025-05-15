<?php

namespace controller;

require_once(__DIR__ . "/../model/errors.php");
require_once(__DIR__ . "/../model/Event.php");

use model\Event as EventModel;


class Event
{
  public $student_ID;
  public $title;
  public $content;
  public $image;
  public $start_date;
  public $end_date;
  public $state = "requested";
  public $validStates = ["requested", "available", "expired"];
  private $admin_ID;
  public $created_at;
  public $updated_at;
  function __construct($title, $content, $start_date, $end_date, $image, $admin_ID = null, $student_ID = null, $state = "requested")
  {
    if (empty(trim($title))) {
      return error422("Enter Event's title!");
    } elseif (empty(trim($content))) {
      return error422("Enter Event's content!");
    } elseif (empty(trim($image))) {
      return error422("Enter Event's your image");
    } elseif (empty(trim($start_date))) {
      return error422("Enter Event's starting  date");
    } elseif (empty(trim($end_date))) {
      return error422("Enter Event's ending  date");
    } else {

      $this->student_ID = $student_ID;
      $this->title = $title;
      $this->content = $content;
      $this->image = $image;
      $this->start_date = $start_date;
      $this->end_date = $end_date;
      $this->state = $state;
      $this->admin_ID = $admin_ID;
    }
  }
  function setAdmin_ID($admin_ID)
  {
    $this->admin_ID = $admin_ID;
  }
  function getAdmin_ID()
  {
    return $this->admin_ID;
  }
  function create()
  {
    $this->sanitize();
    $this->validate();
    $event = new EventModel();
    return $event->create(
      $this->title,
      $this->content,
      $this->image,
      $this->start_date,
      $this->end_date,
      $this->admin_ID,
      $this->state,
      $this->student_ID
    );
  }
  function sanitize()
  {
    $title = trim(filter_var($this->title, FILTER_SANITIZE_STRING));
    $start_date = filter_var($this->start_date, FILTER_SANITIZE_STRING);
    $end_date = filter_var($this->end_date, FILTER_SANITIZE_STRING);
    $content = trim(htmlspecialchars(filter_var($this->content, FILTER_SANITIZE_STRING)));
    $state = trim(filter_var($this->state, FILTER_SANITIZE_STRING));
    $admin_ID = htmlspecialchars(filter_var($this->admin_ID, FILTER_SANITIZE_NUMBER_INT));
    $student_ID = htmlspecialchars(filter_var($this->student_ID, FILTER_SANITIZE_NUMBER_INT));
  }
  function validate()
  {
    if (is_string($this->title) && trim($this->title) !== '') {
      return error422("empty input!");
    } elseif (is_string($this->content) && trim($this->content) !== '') {
      return error422("empty input!");
    } elseif (!in_array($this->state, $this->validStates)) {
      return error422("Invalid STATE!");
    } elseif ($this->admin_ID !== "null") {
      if (filter_var($this->admin_ID, FILTER_VALIDATE_INT)) {
        return error422("Invalid Admin ID !");
      }
    } elseif ($this->student_ID !== "null") {
      if (filter_var($this->student_ID, FILTER_VALIDATE_INT)) {
        return error422("Invalid Student ID !");
      }
    }
    if (!preg_match('/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/', $this->start_date)) {
      return error422(" Invalid date format.");
    }
    if (!preg_match('/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/', $this->end_date)) {
      return error422(" Invalid date format.");
    }
  }

  //readall control\user
  function readallevent()
  {
    $status=200;
    $readEvent = new EventModel();
    // return $readEvent->read();
    $readall=$readEvent->read();
    
    return $readall;
  }

  function read($student_ID)
  {
    $readEvent = new EventModel();
    return $readEvent->read(["student_ID",], [$student_ID,]);
  }
  function update($event_id, $title, $content, $start_date, $end_date, $state)
  {
      $title = trim(filter_var($title, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $start_date = trim(filter_var($start_date, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $end_date = trim(filter_var($end_date, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $content = trim(filter_var($content, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $state = trim(filter_var($state, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $updateEvent = new EventModel();
    return $updateEvent->update(["title","content","start_date","end_date","state"],
     [$title,$content,$start_date,$end_date,$state],
    ["event_ID"],[$event_id]);
  }

  static function DeleteEvent($event_id)
  {
    $delete = new EventModel();
    return $delete->delete(["event_ID"],[$event_id]);
  }
  static function UpdateState($event_id,$state){
    $updateState = new EventModel();
    return $updateState->update(["state"],[$state],
    ["event_ID"],[$event_id]);
  }
   static function ExpireEvent($event_id)
    {
        $event = new EventModel();
        return $event->update(["state"], ["expired"], ["event_ID"], [$event_id]);
    }
    static function AutoExpire()
{
    $eventModel = new EventModel();
    $events = $eventModel->read();
    if (!is_array($events)) {
    $events = [];}
    $today = date('Y-m-d');
    foreach ($events as $event) {
        if (isset($event['end_date']) && $event['end_date'] === $today && $event['state'] !== 'expired') {
            $eventModel->update(
                ['state'], 
                ['expired'], 
                ['event_ID'], 
                [$event['event_ID']]
            );
        }
    }

    return true;
}

  }
?>

