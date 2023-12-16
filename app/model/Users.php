<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");

class Users extends Model {
	private $users;
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {
		$this->users = array();
		$this->db = $this->connect();
		$result = $this->readUsers();
		while ($row = $this->db->fetchRow($result)) {
			array_push($this->users, new User($row["id"],$row["name"],$row["email"],$row["phone"],$row["password"],$row["birth"],$row["gender"]));
		}
	}

	function getUsers() {
		return $this->users;
	}

	function readUsers(){
		$sql = "SELECT * FROM reg";

		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

    function insertUser($name, $email, $phone, $password, $birth, $gender) {
        $stmt = $this->db->prepare("INSERT INTO reg (name, email, phone, password, birth, gender) VALUES (?, ?, ?, ?, ?, ?)");
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param("ssssss", $name, $email, $phone, $hashed_password, $birth, $gender);
    
        if ($stmt->execute() === true) {
            header("Location:login.php");
            $this->fillArray();
        } else {
            echo "ERROR: Could not able to execute $stmt->error";
        }
    
        $stmt->close();
    }
    
  
    function loginUser($email,$password){
      $sql = "SELECT * FROM reg where email='$email'";
      $dbh = new Dbh();
      $result = $dbh->query($sql);
      if ($result->num_rows == 1){
          $row = $dbh->fetchRow();
          if(password_verify($password, $row["password"])){
              $_SESSION["id"]=$row["id"];
              $_SESSION["email"]=$row["email"];
              header("Location:index.php");
          }
      }
      else{
        echo "error";
      }
    }

    function getAllUsers() {
        $sql = "SELECT * FROM reg";
        $result = $this->db->query($sql);
        $users = [];
    
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $users[] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'birth' => $row['birth'],
                    'gender' => $row['gender']
                ];
            }
        }
    
        return $users;
    }

}