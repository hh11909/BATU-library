<?php

namespace model;

require_once("Crud.php");
require_once("errors.php");

use controller\Event as ControllerEvent;
use model\Crud;

class Event
{
  private $table = "Events";
  private $fields = ["title", "content", "image", "start_date", "end_date", "state", "admin_ID", "student_ID"];
  function create(ControllerEvent $event)
  {
    $vals = [$event->title, $event->content, $event->image, $event->start_date, $event->end_date, $event->state, $event->getAdmin_ID(), $event->student_ID];
    $fls = $this->fields;
    if (!$event->getAdmin_ID()) {
      $studentkey = array_pop($fls);
      array_pop($fls);
      $studentVal = array_pop($vals);
      array_pop($vals);
      array_push($fls, $studentkey);
      array_push($vals, $studentVal);
    }
    if (!$event->student_ID) {
      array_pop($fls);
      array_pop($vals);
    }
    return Crud::create($this->table, $fls, $vals);
  }
  function read($filterCols = array(), $filterVals = array())
  {
    if (empty($filterCols) && empty($filterVals)) {
      return Crud::read($this->table);
    } elseif (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
      return Crud::read($this->table, $filterCols, $filterVals);
    } elseif (count($filterCols) != count($filterVals)) {
      return error422('filteration columns count are not equal to their values count!');
    }
  }
  function update($updateCols = array(), $updateVals = array(), $filterCols = array(), $filterVals = array())
  {
    if (count($updateCols) == count($updateVals) && (!empty($updateCols) && !empty($updateVals))) {
      if (empty($filterCols) && empty($filterVals)) {
        return Crud::update($this->table, $updateCols, $updateVals);
      } elseif (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
        return Crud::update($this->table, $updateCols, $updateVals, $filterCols, $filterVals);
      } elseif (count($filterCols) != count($filterVals)) {
        return error422('filteration columns count are not equal to their values count!');
      }
    } elseif (empty($updateCols) || empty($updateVals)) {
      return error422('update columns or values are empty');
    }
  }
  function delete($filterCols = array(), $filterVals = array())
  {
    if (empty($filterCols) && empty($filterVals)) {
      return Crud::delete($this->table);
    } elseif (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
      return Crud::delete($this->table, $filterCols, $filterVals);
    } elseif (count($filterCols) != count($filterVals)) {
      return error422('filteration columns count are not equal to their values count!');
    }
  }
}
