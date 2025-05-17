<?php

namespace model;

require_once(__DIR__ . "/Crud.php");
require_once(__DIR__ . "/errors.php");

class WishlistItem
{
  private $table = 'Wishlists';
  private $fields = ['student_ID', 'book_ID']; //book_name instede of book_id

  public function create($studentId, $bookId)
  {
    $vals = [$studentId, $bookId];
    return Crud::create($this->table, $this->fields, $vals);
  }

  public function read($filterCols = array(), $filterVals = array())
  {
    if (empty($filterCols) && empty($filterVals)) {
      return Crud::read($this->table);
    } elseif (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
      return Crud::read($this->table, $filterCols, $filterVals);
    } elseif (count($filterCols) != count($filterVals)) {
      return error422('Filteration columns count are not equal to their values count!');
    }
  }

  public function delete($filterCols = array(), $filterVals = array())
  {
    if (empty($filterCols) && empty($filterVals)) {
      return Crud::delete($this->table);
    } elseif (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
      return Crud::delete($this->table, $filterCols, $filterVals);
    } elseif (count($filterCols) != count($filterVals)) {
      return error422('Filteration columns count are not equal to their values count!');
    }
  }
}

