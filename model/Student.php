<?php

namespace model;

require_once("Crud.php");
require_once("errors.php");

use controller\Student as ControllerStudent;
use model\Crud;

class Student
{

  private $table = "Students";
  private $fields = ["name", "academy_number", "phone", "gender", "department_ID", "email", "password", "admin_ID", "is_friend"]; //,,"profile_image","student_image"
  function create(ControllerStudent $student)
  {
    $vals = [$student->name, $student->academy_number, $student->phone, $student->gender, $student->department_ID, $student->email, $student->getPassword(), $student->getAdmin_ID(), $student->is_friend ? 0 : 1];
    return Crud::create($this->table, $this->fields, $vals);
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
