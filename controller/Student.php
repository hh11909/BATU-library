<?php

namespace controller;

use model\Student as StudentModel;
use model\Department as DepartmentModel;
use model\College as CollegeModel;

require_once(__DIR__ . "/../model/Student.php");
require_once(__DIR__ . "/User.php");
require_once(__DIR__ . "/../model/department.php");
require_once(__DIR__ . "/../model/college.php");
require_once("Book.php");
// require(__DIR__ . "/../model/errors.php");

class Student extends User
{
  public $student_ID;
  public $academy_number;
  public $academic_year;
  public $phone;
  public $gender;
  public $department_ID;
  public $student_image;
  public $profile_image;
  public $is_friend = 0;
  private $admin_ID;
  function __construct($name, $academy_number,$academic_year, $phone, $gender, $department_ID, $email,$password, $is_friend, $admin_ID, $student_image = null, $profile_image = null, $id = null)
  {
    if ($id != null) {
      $this->id = $id;
    }
    $this->role = 'student';
    $this->name = $name;
    $this->academy_number = $academy_number;
    $this->academic_year = $academic_year;
    $this->phone = $phone;
    $this->gender = $gender;
    $this->department_ID = $department_ID;
    $this->email = $email;
    $this->password = $password;
    $this->student_image = $student_image;
    $this->profile_image = $profile_image;
    $this->is_friend = $is_friend;
    $this->admin_ID = $admin_ID;
  }

  function updatePassword($pass)
  { 
    $stu= new StudentModel();
    $stu->update(["password"],[md5(htmlspecialchars($pass))],["academy_number"],[$this->academy_number]);
  }
  function updatePhone($phone)
  { 
    $stu= new StudentModel();
    $stu->update(["phone"],[trim(htmlspecialchars(filter_var($phone, FILTER_SANITIZE_NUMBER_INT)))],["academy_number"],[$this->academy_number]);
  }
  function getPassword()
  {
    return $this->password;
  }
  function setAdmin_ID($admin_ID)
  {
    $this->admin_ID = $admin_ID;
  }
  function getAdmin_ID()
  {
    return $this->admin_ID;
  }

  static function login($email, $password): Student | Friend | null
  {
    $stuModel = new StudentModel();
    $cols = ['email', 'password'];
    $vals = [$email, $password];
    $result = $stuModel->read($cols, $vals);
    $result = json_decode($result, true);
    if (isset($result["data"])) {
      $result = $result["data"];
      if ($arr = $result[0]) {
        switch ($arr['is_friend']) {
          case 0:
            $user = new Student($arr["name"], $arr["academy_number"],$arr["academic_year"], $arr["phone"], $arr["gender"], $arr["department_ID"], $arr["email"],$arr["password"], $arr["is_friend"], $arr["admin_ID"], $arr["student_image"], $arr["profile_image"], $arr["student_ID"]);
            break;
          case 1:
           require_once(__DIR__."/Friend.php");
            $user = new Friend($arr["name"], $arr["academy_number"],$arr["academic_year"], $arr["phone"], $arr["gender"], $arr["department_ID"], $arr["email"],$arr["password"],$arr["is_friend"], $arr["admin_ID"], $arr["student_image"], $arr["profile_image"], $arr["student_ID"]);
            break;
        }
        return $user;
      }
    }
    return null;
  }
  function create()
  {
      $model = new StudentModel();
      return $model->create($this);
  }
  static function read($name="",$academy_number="",$academic_year="",$phone="",$email="",$page_num=1){
    $cols=['name','academy_number','academic_year','phone','email'];
    $vals=[$name,$academy_number,$academic_year,$phone,$email];
    $model = new StudentModel();
    $limit=5;
    $offset=($page_num-1)*$limit;
    $result = $model->read($cols, $vals,1,$limit,$offset);
    $result = json_decode($result, true);
    if (isset($result["data"])) {
      $count = count($result["data"]);
      $result["count"]=$count;
      for($i=0;$i<$result["count"];$i++){
      $result["data"][$i]["department_name"]=Student::readDepartment($result["data"][$i]["department_ID"])["department"];
      $result["data"][$i]["college_name"]=Student::readDepartment($result["data"][$i]["department_ID"])["college"];
      }
      $result["data"]["total-count"]=Student::totalStudentsCount();
      $result["data"]["total-friends"]=Student::totalFriendsCount();
    }
    return json_encode($result);
  }
  private static function totalStudentsCount(){
    $model = new StudentModel();
    $res = json_decode($model->read(),1);
    $res["total-count"]=(isset($res["data"]))?count($res["data"]):0;
    $res=$res["total-count"];
    return $res;
  }
   private static function totalFriendsCount(){
    $model = new StudentModel();
    $res = json_decode($model->read(["is_friend"],[1]),1);
      $res["total-friend"]=(isset($res["data"]))?count($res["data"]):0;
      $res=$res["total-friend"];
    return $res;
    
  }
  static function delete($student_ID){
    $model = new StudentModel();
    return $model->delete(["student_ID",],[$student_ID]);
  }
  public function sanitize()
  {
    // Continue Sanitization
    $this->name = trim(filter_var($this->name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $this->academy_number = trim(htmlspecialchars(filter_var($this->academy_number, FILTER_SANITIZE_NUMBER_INT)));
    $this->academic_year = trim(htmlspecialchars(filter_var($this->academic_year, FILTER_SANITIZE_NUMBER_INT)));
    $this->phone = trim(htmlspecialchars(filter_var($this->phone, FILTER_SANITIZE_NUMBER_INT)));
    $this->gender = trim(filter_var($this->gender, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $this->department_ID = htmlspecialchars(filter_var($this->department_ID, FILTER_SANITIZE_NUMBER_INT));
    $this->email = trim(htmlspecialchars(filter_var($this->email, FILTER_SANITIZE_EMAIL)));
    $this->password = md5(htmlspecialchars($this->password));
    $this->admin_ID = htmlspecialchars(filter_var($this->admin_ID, FILTER_SANITIZE_NUMBER_INT));
    $this->is_friend = htmlspecialchars(filter_var($this->is_friend, FILTER_SANITIZE_NUMBER_INT));
  }
  public function validate()
  {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      return error422("Invalid Email!");
    } elseif (!filter_var($this->academy_number, FILTER_VALIDATE_INT)) {
      return error422("Invalid Academy Number!");
    } elseif ($this->academic_year!=""&&!filter_var($this->academic_year, FILTER_VALIDATE_INT)) {
      return error422("Invalid Academic year!");
    } elseif (!preg_match("/^01[0-2,5]{1}[0-9]{8}$/", $this->phone)) {
      return error422("Invalid Academy Phone!");
    } elseif (!filter_var($this->department_ID, FILTER_VALIDATE_INT)) {
      return error422("Invalid Department ID!");
    } elseif (!filter_var($this->admin_ID, FILTER_VALIDATE_INT)) {
      return error422("Invalid Phone Number!");
    } elseif (filter_var($this->is_friend, FILTER_VALIDATE_BOOLEAN)) {
      return error422("Invalid Is Friend Bool Value!");
    }
    $this->admin_ID = (int)$this->admin_ID;
    $this->department_ID = (int)$this->department_ID;
    $this->academy_number = (int)$this->academy_number;
    $this->is_friend = (bool) $this->is_friend;
    return true;
  }
  
  public static function readDepartment($department_ID)
  {
    $departmentModel = new DepartmentModel();
    $filterCols = ["department_ID"];
    $filterVals = [$department_ID];
    $departmentData = $departmentModel->read($filterCols, $filterVals);
    $departmentData = json_decode($departmentData, true);
    if (isset($departmentData["data"][0])) {
      $college_id = $departmentData["data"][0]["college_ID"];
      $collegeData = Student::readCollege($college_id);
      $collegeData = json_decode($collegeData, true);
      return [
        "department" => $departmentData["data"][0]["department_name"],
        "college" => isset($collegeData["data"][0]) ? $collegeData["data"][0]["college_name"] : null
      ];
    } 
    else 
    {
      return error422("Department not found!");
    }
  }

  public static function readCollege($college_id)
  {
    $collegeModel = new CollegeModel();
    $filterCols = ["college_id"];
    $filterVals = [$college_id];
    $collegeData = $collegeModel->read($filterCols, $filterVals);
    return $collegeData;
  }



  use Book{
  readBooks as public;
  readBBooks as public;
  readBooById as public;
  createBook as private;
  updateBook as private;
  deleteBook as private;   
  }
  function updateProfileImage($image){
    $prefix="profile_";
    $path="profile/";
    $res=json_decode(Images::createImage($prefix,$path,$image),true);
    if(isset($res["data"])){
      $this->profile_image=$res["data"];
      $model=new StudentModel;
      $update=json_decode($model->update(["profile_image"],[$this->profile_image],["student_ID"],[$this->id]),true);
      $update["data"]=$res["data"];
      echo json_encode($update);
    }
    else{
      return json_encode($res);
    }
  }
  function updateBannerImage($image){
    $prefix="banner_";
    $path="banner/";
    $res=json_decode(Images::createImage($prefix,$path,$image),true);
    if(isset($res["data"])){
      $this->student_image=$res["data"];
      $model=new StudentModel;
      $update=json_decode($model->update(["student_image"],[$this->student_image],["student_ID"],[$this->id]),true);
      $update["data"]=$res["data"];
      echo json_encode($update);
    }
    else{
      return json_encode($res);
    }
  }
}

