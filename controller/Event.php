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
    if (empty(trim($this->title))) {
      return error422("Enter Event's title!");
    } elseif (empty(trim($this->content))) {
      return error422("Enter Event's content!");
    } elseif (empty(trim($this->image))) {
      return error422("Enter Event's your image");
    } elseif (empty(trim($this->start_date))) {
      return error422("Enter Event's starting  date");
    } elseif (empty(trim($this->end_date))) {
      return error422("Enter Event's ending  date");
    } elseif (empty(trim($this->admin_ID))) {
      return error422("Enter your admin ID!");
    } elseif (empty(trim($this->student_ID))) {
      return error422("Enter your admin ID!");
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
    } elseif (filter_var($this->admin_ID, FILTER_VALIDATE_INT)) {
      return error422("Invalid Admin ID !");
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
  function readall()
  {
    $readEvent = new EventModel();
    return $readEvent->read();
  }
  //read control\event
  function read($student_ID)
  {
    $readEvent = new EventModel();
    return $readEvent->read(["student_ID",], [$student_ID,]);
  }
  function update($event_id)
  {
    $event_id = new EventModel();
    return $event_id->update(["event_id",], [$event_id,]);
  }
  function delete($role)
  {
    $delet = new EventModel();
    return $delet->read(["role",], [$role,]);
  }
  // function update($conn, $event_id, $title, $content, $start_date, $end_date, $state) {
  //         $title = mysqli_real_escape_string($conn, $title);
  //         $start_date = mysqli_real_escape_string($conn, $start_date);
  //         $end_date = mysqli_real_escape_string($conn, $end_date);
  //         $content = mysqli_real_escape_string($conn, $content);
  //         $state = mysqli_real_escape_string($conn, $state);

  //         $query = "UPDATE events SET 
  //                     title='$title', 
  //                     start_date='$start_date', 
  //                     end_date='$end_date', 
  //                     content='$content',
  //                     state='$state'
  //                   WHERE id='$event_id'";

  //         return mysqli_query($conn, $query);
  // }
  // function delete ($conn, $event_id) {
  //         $event_id = mysqli_real_escape_string($conn, $event_id);
  //         $query = "UPDATE events SET state='expired' WHERE id='$event_id'";
  //         return mysqli_query($conn, $query);
  //     }

}

