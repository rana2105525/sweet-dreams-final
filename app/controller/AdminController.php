<?php
require_once(__ROOT__ . "controller/Controller.php");
class AdminController extends Controller{
	public $nameErr ="";
	public $emailErr = "";
	public $phoneErr = "";
   public $passwordErr = "";
  public  $birthErr = '';
  public $genderErr="";


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


	public function login() {
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
			 $this->model->loginAdmin($email, $password);
		  }
        
    }

	public function insertA() {
		$name = $_REQUEST['name'];
		$phone = $_REQUEST['number'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
        $gender=$_REQUEST["gender"];

		
		  if (empty($name)) {
			$this->nameErr = "Name is required";
		  } else {
			if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
			  $this->nameErr = "Only letters and white space allowed";
			}
		  }
		  $conn = mysqli_connect("172.232.217.28", "root", "SweetDreams123", "sweetdreams");
    $sql = "SELECT * FROM admins WHERE Email = '$email'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $this->emailErr = "Email exists in the database";
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
	  
			if (!$this->isValidPhoneNumber($phone, $desiredLength)) {
				$this->phoneErr = "Invalid phone number format or length"; 
			}
		  }
		  if (empty($password)) {
			$this->passwordErr = "Password is required";
		  }
		  // } elseif (!$this->isStrongPassword($_POST["password"])) {
		  //   $this->passwordErr = "Password must be at least 8 characters long and contain one uppercase letter, one lowercase letter, one number, and one special character";
		  // }
		
		  if (empty($gender)) {
			$this->genderErr = "Gender must be one of the following";
		  }
		    
		
		if (empty($this->nameErr) && empty($this->emailErr) && empty($this->phoneErr) && empty($this->passwordErr) && empty($this->genderErr)) {
            
            $this->model->insertAdmin($name, $phone,$email ,$password, $gender);
            
            
        }
		
	}

	public function editA() {
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_REQUEST['name'];
		$phone = $_REQUEST['number'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
        $gender=$_REQUEST["gender"];
        
		
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
	  
			if (!$this->isValidPhoneNumber($phone, $desiredLength)) {
				$this->phoneErr = "Invalid phone number format or length"; 
			}
		  }
		  if (empty($password)) {
			$this->passwordErr = "Password is required";
		  }
		  // } elseif (!$this->isStrongPassword($_POST["password"])) {
		  //   $this->passwordErr = "Password must be at least 8 characters long and contain one uppercase letter, one lowercase letter, one number, and one special character";
		  // }
		
		  if (empty($gender)) {
			$this->genderErr = "Gender must be one of the following";
		  }
		
		
		
		
		  if (empty($this->nameErr) && empty($this->emailErr) && empty($this->phoneErr) && empty($this->passwordErr)&&empty($this->genderErr)) {
			
			$this->model->editAdmin($name, $phone, $email, $password, $gender);
			
		  }
		
	}}
	public function getErrors() {
      
		$errors = [
		  'nameErr' => $this->nameErr,
		  'emailErr' => $this->emailErr,
		  'phoneErr' => $this->phoneErr,
		  'passwordErr' => $this->passwordErr,
		  'genderErr'=>$this->genderErr
		];
		return $errors;
	  }
	public function deleteA(){
		$this->model->deleteAdmin();
	}

	public function getAllA() {
        return $this->model->getAllAdmins();
    }

    // public function displayA() {
    //     return $this->model->displayAdmin();
    // }
}





?>