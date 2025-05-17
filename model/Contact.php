<?php

namespace model;

use controller\Contact as ControllerContact;

require_once __DIR__ . "/../controller/Contact.php";
require_once 'Crud.php';
require_once 'errors.php';


class Contact
{
  private $table = 'contact';
  private $fields = ['name', 'email', 'message'];
  public function create(ControllerContact $contact)
  {
    $vals = [$contact->name, $contact->email, $contact->message];
    $cols = $this->fields;
    if ($contact->student_ID) {
      array_push($vals, $contact->student_ID);
      array_push($cols, 'student_ID');
    }
    if (!empty($vals) && count($vals) >= 3) {
      return Crud::create($this->table, $cols, $vals);
    } else {
      error422("Bad Request", 400);
    }
  }
  public function read(array $filterCols = [], array $filterVals = [])
  {
    if (empty($filterCols) && empty($filterVals)) {
      return Crud::read($this->table);
    } elseif (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
      return Crud::read($this->table, $filterCols, $filterVals);
    } elseif (count($filterCols) != count($filterVals)) {
      return error422('filteration columns count are not equal to their values count!');
    }
  }
  public function delete($filterCols = array(), $filterVals = array())
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
