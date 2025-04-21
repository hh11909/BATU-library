<?php
  class Student{
    public $student_ID;
    public $name;
    public $academy_number;
    public $phone;
    public $gender;
    public $department;
    public $email;
    protected $password;
    public $student_image;
    public $profile_image;
    public $is_friend;
    public $admin_ID;
    public $created_at;
    public $updated_at;

    function __construct($student_ID,$name,$academy_number,$phone,$gender,$department,$email,$password,$student_image,$profile_image,$is_friend,$admin_ID,$created_at,$updated_at)
    {
      $this->student_ID=$student_ID;
      $this->name=$name;
      $this->academy_number=$academy_number;
      $this->phone=$phone;
      $this->gender=$gender;
      $this->department=$department;
      $this->email=$email;
      $this->password=$password;
      $this->student_image=$student_image;
      $this->profile_image=$profile_image;
      $this->is_friend=$is_friend;
      $this->admin_ID=$admin_ID;
      $this->created_at=$created_at;
      $this->updated_at=$updated_at;
    }

    public static function login($email,$password){
      $user=null;
      $qry="SELECT * FROM Students WHERE email='$email' AND password='$password'";
      require_once("config.php");
      $cn=mysqli_connect(DB_HOST_NAME,DB_USER_NAME,DB_USER_PASSWORD,DB_NAME);
      $result=mysqli_query($cn,$qry);
      if($arr=mysqli_fetch_assoc($result)){
        switch($arr["is_friend"]){
          case 0:
            $user= new Student($arr["student_id"],$arr["name"],$arr["academy_number"],$arr["phone"],$arr["gender"],$arr["department"],$arr["email"],$arr["password"],$arr["student_image"],$arr["profile_image"],$arr["is_friend"],$arr["admin_ID"],$arr["created_at"],$arr["updated_at"]);
            break;
            case 1:
            $user= new Friend($arr["student_id"],$arr["name"],$arr["academy_number"],$arr["phone"],$arr["gender"],$arr["department"],$arr["email"],$arr["password"],$arr["student_image"],$arr["profile_image"],$arr["is_friend"],$arr["admin_ID"],$arr["created_at"],$arr["updated_at"]);
            break;
          }
        }
        mysqli_close($cn);
        return $user;
        
      }
  }
  class Friend extends Student{
    public $is_friend=1;
    
  }
  ?>