<?php
namespace model;

require_once("Crud.php");
require_once("errors.php");
use model\Crud;

class Department {
    private $table = "Departments";
    private $fields = ["department_ID", "department_name", "college_id"];

    function read($filterCols = array(), $filterVals = array()) {
        try {
            if (empty($filterCols) && empty($filterVals)) {
                return Crud::read($this->table);
            } elseif (count($filterCols) == count($filterVals) && (!empty($filterCols) && !empty($filterVals))) {
                return Crud::read($this->table, $filterCols, $filterVals);
            } else {
                throw new \Exception("Filter columns count are not equal to their values count!");
            }
        } catch (\Exception $e) {
            return error422($e->getMessage());
        }
    }
}
?>