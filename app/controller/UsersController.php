<?php
require_once(__ROOT__ . "controller/Controller.php");


class UsersController extends Controller{
  public function insert()
  {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $password = $_REQUEST['password'];
    $birth = $_REQUEST["birth"];
    $gender = $_REQUEST["gender"];
  
    // Validate inputs
    $nameErr = $emailErr = $phoneErr = $passwordErr = $birthErr = '';
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
      $nameErr = "Name is required";
    } else {
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
  
  
    if (empty($email)) {
      $emailErr = "Email is required";
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
  
  
    if (empty($phone)) {
      $phoneErr = "Phone number is required";
    } else {
      $desiredLength = 11; 

      if (!isValidPhoneNumber($phone, $desiredLength)) {
          $phoneErr = "Invalid phone number format or length"; 
      }
    }
    
  
  
    if (empty($password)) {
      $passwordErr = "Password is required";
    } elseif (!isStrongPassword($_POST["password"])) {
      $passwordErr = "Password must be at least 8 characters long and contain one uppercase letter, one lowercase letter, one number, and one special character";
    }
    
    if (empty($birth)) {
      $birthErr = "Enter your birth date";
    } else {
      if (!isDateValid($birth)) {
        $birthErr = "Birth date cannot be in the future";
      }
    }
  
  
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passwordErr) && empty($birthErr)) {
      
      $this->model->insertUser($name, $email, $phone, $password, $birth, $gender);
      
    } else {
      
      $errors = [
        'nameErr' => $nameErr,
        'emailErr' => $emailErr,
        'phoneErr' => $phoneErr,
        'passwordErr' => $passwordErr,
        'birthErr' => $birthErr
      ];
      $view = new ViewUser($this, $this->model); 
      echo $view->signupForm($errors);
    }
  
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