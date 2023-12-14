<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/admin.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");

class Admins extends Model {
	private $admins;
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {
		$this->admins = array();
		$this->db = $this->connect();
		$result = $this->readAdmins();
		while ($row = $this->db->fetchRow($result)) {
			array_push($this->admins, new Admin($row["ID"],$row["Username"],$row["Phone"],$row["Email"],$row["Password"],$row["Gender"]));
		}
	}


	function readAdmins(){
		$sql = "SELECT * FROM admins";

		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

    function insertAdmin($name, $email, $phone, $password, $gender) {
        $stmt = $this->db->prepare("INSERT INTO admins (Username, Email, Phone, Password, Gender) VALUES (?, ?, ?, ?, ?, ?)");
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param("ssssss", $name, $email, $phone, $hashed_password, $gender);
    
        if ($stmt->execute() === true) {
            header("Location: login.php");
            $this->fillArray();
        } else {
            echo "ERROR: Could not able to execute $stmt->error";
        }
    
        $stmt->close();
    }
    
    function getAllAdmins() {
        $sql = "SELECT * FROM admins";
        $result = $this->db->query($sql);
        $admins = [];
    
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $admins[] = [
                    'ID' => $row['ID'],
                    'Username' => $row['Username'],
                    'Email' => $row['Email'],
                    'Phone' => $row['Phone'],
                    'Gender' => $row['Gender']
                ];
            }
        }
    
        return $admins;
    }
    function loginAdmin($email,$password){
      $sql = "SELECT * FROM admins where Email='$email'";
      $dbh = new Dbh();
      $result = $dbh->query($sql);
      if ($result->num_rows == 1){
          $row = $dbh->fetchRow();
          if(password_verify($password, $row["password"])){
              $_SESSION["ID"]=$row["ID"];
              $_SESSION["Email"]=$row["Email"];
              header("Location: allAdmins.admins.php");
          }
      }
      else{
        echo "error";
      }
    }

    
}