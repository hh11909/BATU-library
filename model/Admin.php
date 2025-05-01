<?php

namespace model;

class Admin
{

  private $table = "Admins";
  private $fields = ["name", "email", "password"];
  function create(string $name, string $email, string $password): string | false
  {
    if (empty(trim($name))) {
      return error422("Enter student's name!");
    } elseif (empty(trim($email))) {
      return error422("Enter student's email!");
    } elseif (empty(trim($password))) {
      return error422("Enter student's password!");
    } else {
      $name = trim(filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
      $email = trim(htmlspecialchars(filter_var($email, FILTER_SANITIZE_EMAIL)));
      $password = md5(htmlspecialchars($password));
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return error422("Invalid Email!");
      } else {
        $vals = [$name, $email, $password];
        return Crud::create($this->table, $this->fields, $vals);
      }
    }
  }
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
