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

    function insertAdmin($name, $phone, $email, $password, $gender) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO admins (Username, Phone, Email, Password, Gender) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $phone, $email, $hashed_password, $gender);
    
        if ($stmt->execute() === true) {
            // Successful insertion
            $this->fillArray();
            return true;
        } else {
            // Error occurred
            echo "ERROR: Could not able to execute $stmt->error";
            return false;
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
    public function adminLogin($email, $password) {
        $sql = "SELECT * FROM admins WHERE Email='$email'";
        $dbh = new Dbh();
        $result = $dbh->query($sql);
    
        if ($result->num_rows == 1) {
            $row = $dbh->fetchRow();
            if (password_verify($password, $row["Password"])) {
                $_SESSION["ID"] = $row["ID"];
                $_SESSION["Email"] = $row["Email"];
                header("Location: viewAdmin.admin.php");
            }
        } else {
            echo "error";
        }
    }
    
    
}