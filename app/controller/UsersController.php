<?php
require_once(__ROOT__ . "controller/Controller.php");

 
class UsersController extends Controller{
public $nameErr ="";
  public $emailErr = "";
  public $phoneErr = "";
 public $passwordErr = "";
public  $birthErr = '';

  public function insert()
  {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    $birth = $_REQUEST["birth"];
    $gender = $_REQUEST["gender"];
  
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
    
  
  
    if (empty($password)) {
      $this->passwordErr = "Password is required";
    } elseif (!isStrongPassword($_POST["password"])) {
      $this->passwordErr = "Password must be at least 8 characters long and contain one uppercase letter, one lowercase letter, one number, and one special character";
    }
    
    if (empty($birth)) {
      $this->birthErr = "Enter your birth date";
    } else {
      if (!isDateValid($birth)) {
        $this->birthErr = "Birth date cannot be in the future";
      }
    }
  
  
    if (empty($this->nameErr) && empty($this->emailErr) && empty($this->phoneErr) && empty($this->passwordErr) && empty($this->birthErr)) {
      
      $this->model->insertUser($name, $email, $phone, $password, $birth, $gender);
      
    }
    } 
    public function getErrors() {
      
      $errors = [
        'nameErr' => $this->nameErr,
        'emailErr' => $this->emailErr,
        'phoneErr' => $this->phoneErr,
        'passwordErr' => $this->passwordErr,
        'birthErr' => $this->birthErr
      ];
      return $errors;
    }
  


	public function edit() {
		$name = $_REQUEST['name'];
    	$email = $_REQUEST['email'];
		$this->model->editUser($name,$email);
	}

	public function delete(){
		$this->model->deleteUser();
	}
}
?>