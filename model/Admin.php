<?php

namespace model;

require_once("./Crud.php");

class Admin
{

  private $table = "Admins";
  private $fields = ["name", "email", "password"];
  /**
   * @param array<string> $filterCols
   * @param array<string> $filterVals
   */
  function read($filterCols = array(), $filterVals = array()): string | false
  {
    if (empty($filterCols) && empty($filterVals)) {
      return Crud::read($this->table);
    } elseif (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
      return Crud::read($this->table, $filterCols, $filterVals);
    } elseif (count($filterCols) != count($filterVals)) {
      return error422('filteration columns count are not equal to their values count!');
    }
    return false;
  }
  /**
   * @param array<string> $updateCols
   * @param array<string> $updateVals
   * @param array<string> $filterCols
   * @param array<string> $filterVals
   */
  function update($updateCols = array(), $updateVals = array(), $filterCols = array(), $filterVals = array()): string | false
  {
    if (count($updateCols) == count($updateVals) && (!empty($updateCols) && !empty($updateVals))) {
      if (empty($filterCols) && empty($filterVals)) {
        return Crud::update($this->table, $updateCols, $updateVals);
      } else if (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
        return Crud::update($this->table, $updateCols, $updateVals, $filterCols, $filterVals);
      } else if (count($filterCols) != count($filterVals)) {
        return error422('filteration columns count are not equal to their values count!');
      }
    } elseif (empty($updateCols) || empty($updateVals)) {
      error422('update columns or values are empty');
    }
    return false;
  }
  /**
   * @param array<string> $filterCols
   * @param array<string> $filterVals
   */
  function delete($filterCols = array(), $filterVals = array()): string | false
  {
    if (empty($filterCols) && empty($filterVals)) {
      return Crud::delete($this->table);
    } else if (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
      return Crud::delete($this->table, $filterCols, $filterVals);
    } else if (count($filterCols) != count($filterVals)) {
      error422('filteration columns count are not equal to their values count!');
    }
    return false;
  }
}
