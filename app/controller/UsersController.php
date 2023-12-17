<?php

require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "model/Model.php");

 
class UsersController extends Controller{
public $nameErr ="";
  public $emailErr = "";
  public $phoneErr = "";
 public $passwordErr = "";
public  $birthErr = '';
public $confirmErr="";



  public function insert()
  {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    $birth = $_REQUEST["birth"];
    $gender = $_REQUEST["gender"];
    $confirm = $_REQUEST["confirm"];
    // Validate inputs
    
    function isValidPhoneNumber($phoneNumber, $desiredLength) {
      
      $pattern = '/^\+?[0-9]+$/'; 
      $isValidFormat = preg_match($pattern, $phoneNumber);
  
      
      $isValidLength = (strlen($phoneNumber) === $desiredLength);
  
      return ($isValidFormat && $isValidLength);
  }
  function isStrongPassword($password)
{

  $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/';
  return preg_match($pattern, $password);
}
function getTodayDate()
{
  return date('Y-m-d');
}

function isDateValid($date)
{
  $maxDate = getTodayDate(); 

  if ($date > $maxDate) {
    return false; 
  }

  return true; 
}
  

    if (empty($name)) {
      $this->nameErr = "Name is required";
    } else {
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $this->nameErr = "Only letters and white space allowed";
      }
    }
    $conn = mysqli_connect("172.232.217.28", "root", "SweetDreams123", "sweetdreams");
    $sql = "SELECT * FROM reg WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // $this->emailErr = "Email exists in the database";
    return false;
  }
  
  
    if (empty($email)) {
      $this->emailErr = "Email is required";
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->emailErr = "Invalid email format";
      }
    }
  
  
    if (empty($phone)) {
      $this->phoneErr = "Phone number is required";
    } else {
      $desiredLength = 11; 

      if (!isValidPhoneNumber($phone, $desiredLength)) {
          $this->phoneErr = "Invalid phone number format or length"; 
      }
    }
    
    if (empty(["confirm"])) {
      $this->confirmErr = "Confirm is required";
    } else {
      if ($_POST["password"] !== $_POST["confirm"]) {
        $this->confirmErr = "Passwords don't match";
      }
    }
  
    if (empty($password)) {
      $this->passwordErr = "Password is required";
    }
    // } elseif (!isStrongPassword($_POST["password"])) {
    //   $this->passwordErr = "Password must be at least 8 characters long and contain one uppercase letter, one lowercase letter, one number, and one special character";
    // }
    
    if (empty($birth)) {
      $this->birthErr = "Enter your birth date";
    } else {
      if (!isDateValid($birth)) {
        $this->birthErr = "Birth date cannot be in the future";
      }
    }
  
  
    if (empty($this->nameErr) && empty($this->emailErr) && empty($this->phoneErr) && empty($this->passwordErr) && empty($this->birthErr)&&empty($this->confirmErr)) {
      
      $this->model->insertUser($name, $email, $phone, $password, $birth, $gender);
      
    }
    } 
    public function getErrors() {
      
      $errors = [
        'nameErr' => $this->nameErr,
        'emailErr' => $this->emailErr,
        'phoneErr' => $this->phoneErr,
        'passwordErr' => $this->passwordErr,
        'birthErr' => $this->birthErr,
        'confirmErr'=>$this->confirmErr
      ];
      return $errors;
    }
  
    public function login(){
      
      $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    if (empty($email)) {
      $this->emailErr = "Email is required";
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->emailErr = "Invalid email format";
      }
    }
  
    if (empty($password)) {
      $this->passwordErr = "Password is required";
    }
    if (empty($this->emailErr)&&empty($this->passwordErr) ) {
    $this->model->loginUser($email,$password);
    }
    }

	public function edit() {
		$name = $_REQUEST['name'];
    	$email = $_REQUEST['email'];

      if (empty($name)) {
        $this->nameErr = "Name is required";
      } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
          $this->nameErr = "Only letters and white space allowed";
        }
      }

  if (empty($email)) {
      $this->emailErr = "Email is required";
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->emailErr = "Invalid email format";
      }
    }

  if (empty($this->emailErr)&&empty($this->nameErr) ) {
		$this->model->editUser($name,$email);
	}
  }
  
	public function delete(){
		$this->model->deleteUser();
	}
  public function getAllU() {
    return $this->model->getAllUsers();
}
public function readMyOrders()
{
    $user_id=$_SESSION['id'];
    $this->model->showUserHistory($user_id);
}
}
?>