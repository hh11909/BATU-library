<?php

namespace controller;

require_once("User.php");
require_once(__DIR__ . "/../model/Admin.php");

use controller\User;


class Admin extends User
{
  public $role = "admin";
  public function __construct(
    string $name,
    string $email,
    string $password,
    ?int $id
  ) {
    if ($id != null) {
      $this->id = $id;
    }
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }
  public function to_json(): string | null
  {
    if ($this->name && $this->email && $this->password) {
      $arr = [];
      $arr['id'] = $this->id;
      $arr['name'] = $this->name;
      $arr['email'] = $this->email;
      $arr['role'] = $this->role;
      return json_encode($arr);
    }
    return null;
  }
  static function login(string $email, string $password): Admin | null
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      error422("Invalid Email!");
    } else {
      $stuModel = new \model\Admin();
      $cols = ['email', 'password'];
      $vals = [$email, $password];
      $result = $stuModel->read($cols, $vals);
      $result = json_decode($result, true);
      if (isset($result["data"])) { //Men3em modified here
      $result = $result["data"];
        if ($arr = $result[0]) {
          $user = new Admin(
            $arr["name"],
            $arr["email"],
            $arr["password"],
            $arr["admin_ID"],
          );
          return $user;
        }
      }
    }
    error422("No Result");
    return null;
  }
  private function check(): true
  {
    if (empty($this->email) || empty($this->password) || empty($this->id) || $this->role != 'admin') {
      error422("Admin is not authorized");
    }
    return true;
  }
  public function updatePassword(string $newPassword)
  {
    $newPassword = md5(htmlspecialchars($newPassword));
    $model = new \model\Admin();
    $cols = ['password'];
    $vals = [$newPassword];
    $filterCols = ['email', 'admin_ID'];
    $filterVals = [$this->email, $this->id];
    if ($this->check()) {
      $result = $model->update($cols, $vals, $filterCols, $filterVals);
      $result = json_decode($result, true);
      echo json_encode([
        "status" => $result['status']
      ]);
    }
  }
  public function read(?int $id = null): string | null
  {
    $model = new \model\Admin();
    $cols = ['admin_ID'];
    if ($id) {
      $vals = [$id];
    } else {
      $vals = [$this->id];
    }
    $result = $model->read($cols, $vals);
    $result = json_decode($result, true);
    $status = $result['status'];
    $result = $result['data'][0];
    $result = [
      "id" => $result['admin_ID'],
      "name" => $result['name'],
      "email" => $result['email'],
      'role' => $this->role
    ];
    $result = json_encode([
      'status' => $status,
      'data' => $result
    ]);
    echo $result;
    return $result;
  }
  /**
   * @param array<string> $keys
   * @param array<mixed> $values
   */
  public function update(array $keys, array $values): void
  {
    $model = new \model\Admin();
    $filterCols = ['email', 'admin_ID'];
    $filterVals = [$this->email, $this->id];
    $passwordIndex = array_keys($keys, 'password')[0];
    if ($this->check()) {
      if ($passwordIndex !== null) {
        $values[$passwordIndex] = md5(htmlspecialchars($values[$passwordIndex]));
      }
      var_dump($values);
      if (array_keys($keys, 'id')[0] || array_keys($keys, 'admin_ID')[0]) {
        error422('Unauthorized', 401);
      }
      $result = $model->update($keys, $values, $filterCols, $filterVals);
      $result = json_decode($result, true);
      $updated = $this->read();
      $updated = json_decode($updated, true);
      $updated = $updated['data'];
      if ($passwordIndex !== null) {
        $admin = $this->login($updated['email'], $values[$passwordIndex]);
      } else {
        $admin = $this->login($updated['email'], $this->password);
      }
      $_SESSION['user'] = serialize($admin);
      echo json_encode([
        "status" => $result['status']
      ]);
    }
  }
  /**
   * @param int[]|int $ids
   */
  public function delete(array | int | null $ids = null): void
  {
    $model = new \model\Admin();
    if ($this->check()) {
      if (is_array($ids)) {
        $allIsGood = true;
        $statuses = [];
        for ($i = 0; $i < count($ids); $i++) {
          $filterCols = ['admin_ID'];
          $filterVals = [$ids[$i]];
          $result = $model->delete($filterCols, $filterVals);
          $result = json_decode($result, true);
          $allIsGood = $result['status'] >= 200 && $result['status'] < 300;
          var_dump($allIsGood, $result['status']);
          if (!$allIsGood) {
            array_push($statues, [
              "id" => $ids[$i],
              'status' => $result['status']
            ]);
          }
        }
        if (!count($statuses)) {
          echo json_encode([
            "status" => $result['status']
          ]);
        } else {
          echo json_encode($statuses);
        }
      } else if ($ids) {
        $filterCols = ['admin_ID'];
        $filterVals = [$ids];
        $result = $model->delete($filterCols, $filterVals);
        $result = json_decode($result, true);
        echo json_encode([
          "status" => $result['status']
        ]);
      } else {
        $filterCols = ['email', 'admin_ID'];
        $filterVals = [$this->email, $this->id];
        $result = $model->delete($filterCols, $filterVals);
        $result = json_decode($result, true);
        echo json_encode([
          "status" => $result['status']
        ]);
      }
    }
  }
   function storeStudent(Student $student)
  {
    // Sanitization
    $student->sanitize();
    // Validation
    if ($student->validate()) {
      if($student->is_friend==0){
        return $student->create();
      }
      elseif($student->is_friend==1){
        $friend=new Friend(
          name: $_POST['name'],
          email: $_POST['email'],
          password: $_POST['password'],
          phone: $_POST['phone'],
          is_friend: $_POST['is_friend'],
          admin_ID: $_POST['admin_ID'],
          department_ID: $_POST['department_ID'],
          gender: $_POST['gender'],
          academy_number: $_POST['academy_number'],
          student_image: $_POST['student_image']
        );
        $friend->create();
      }
    }
  }
}
