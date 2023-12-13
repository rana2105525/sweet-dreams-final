<?php
require_once(__ROOT__ . "controller/Controller.php");
class AdminController extends Controller{
	public $nameErr ="";
	public $emailErr = "";
	public $phoneErr = "";
   public $passwordErr = "";
  public  $birthErr = '';
  public $confirmErr="";

  function isValidPhoneNumber($phoneNumber, $desiredLength) {
	$pattern = '/^\+?[0-9]+$/'; 
	$isValidFormat = preg_match($pattern, $phoneNumber);
	$isValidLength = (strlen($phoneNumber) === $desiredLength);
	return ($isValidFormat && $isValidLength);
}

function isStrongPassword($password) {
	$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/';
	return preg_match($pattern, $password);
}


	public function login($email, $password) {
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
			 $this->model->loginAdmin($email, $password);
		  }
        
    }

	public function insertA() {
		$name = $_REQUEST['UserName'];
		$email = $_REQUEST['Email'];
		$phone = $_REQUEST['Phone'];
		$password = $_REQUEST['Password'];
        $gender=$_REQUEST["Gender"];

		
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
		  
		
		
		  if (empty($this->nameErr) && empty($this->emailErr) && empty($this->phoneErr) && empty($this->passwordErr)&&empty($this->confirmErr)) {
			
			$this->model->insertAdmin($name,$email,$phone,$password,$gender);
			
		  }
		
	}
	public function getErrors() {
      
		$errors = [
		  'nameErr' => $this->nameErr,
		  'emailErr' => $this->emailErr,
		  'phoneErr' => $this->phoneErr,
		  'passwordErr' => $this->passwordErr,
		  'confirmErr'=>$this->confirmErr
		];
		return $errors;
	  }

	public function editA() {
        $name = $_REQUEST['UserName'];
		$email = $_REQUEST['Email'];
		$phoneNumber = $_REQUEST['Phone'];
		$password = $_REQUEST['Password'];
        $gender=$_REQUEST["Gender"];
        
		
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
		  
	
		
		
		  if (empty($this->nameErr) && empty($this->emailErr) && empty($this->phoneErr) && empty($this->passwordErr)&&empty($this->confirmErr)) {
			
			$this->model->editAdmin($name, $phoneNumber, $email, $password, $gender);
			
		  }
		
	}

	public function deleteA(){
		$this->model->deleteAdmin();
	}

	public function getAllA() {
        return $this->model->getAllAdmins();
    }

    public function displayA($admin) {
        return $this->model->displayAdmin($admin);
    }
}





?>