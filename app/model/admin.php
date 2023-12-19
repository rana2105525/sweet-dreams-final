<?php 
require_once(__ROOT__ . "model/Model.php");
class Admin extends Model
{
private $ID;
private $UserName;
private $Phone;
private $Email;
private $Password;
private $Gender;

function __construct($id= null,$name="",$email="",$phone="",$password="",$gender="") {

	$this->db = $this->connect();

    if ($id !== null) {
        $this->ID = $id;
        $this->readAdmin($id);}
    else{
      $this->UserName = $name;
      $this->Email=$email;
      $this->Phone=$phone;
	  $this->Password=$password;
      $this->Gender = $gender;
    }
  }
   
   public function setUserName($name) {
    $this->UserName = $name;
}

public function setPhone($phone) {
    $this->Phone = $phone;
}

public function setEmail($email) {
    $this->Email = $email;
}

public function setPassword($password) {
    $this->Password = $password;
}

public function setGender($gender) {
    $this->Gender = $gender;
}

public function getID() {
    return $this->ID;
}

public function getUserName() {
    return $this->UserName;
}

public function getPhone() {
    return $this->Phone;
}

public function getEmail() {
    return $this->Email;
}

public function getPassword() {
    return $this->Password;
}

public function getGender() {
    return $this->Gender;
}

function readAdmin($id) {
    $sql = "SELECT * FROM admins WHERE id = $id";
    $result = $this->db->query($sql);

    if ($result === false) {
        // Handle the SQL error, for example:
        die("Error executing the query: ");
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $this->UserName = $row["Username"];
        $_SESSION["Username"] = $row["Username"];
        $this->Email = $row["Email"];
        $this->Phone = $row["Phone"];
        $this->Password = $row["Password"];
        $this->Gender = $row["Gender"];
    } else {
        $this->UserName = "";
        $this->Email = "";
        $this->Phone = "";
        $this->Password = "";
        $this->Gender = "";
    }
}


function editAdmin($name, $phoneNumber, $email)
{
  
    $sql = "UPDATE admins SET Username='$name', Phone='$phoneNumber', Email='$email' WHERE ID='$this->ID'";
    if($this->db->query($sql) === true){
        $this->readAdmin($this->ID);
    } else{
        echo "ERROR: Could not able to execute";
    }

}
function deleteAdmin()
{
    $sql="delete from admins where id=$this->ID;";
  if($this->db->query($sql) === true){
          return true;
      } else{
          echo "ERROR: Could not able to execute $sql. ";
      }
}

// function displayAdmin() {
//     echo "<div class='admin-info'>";
//     echo "<div class='input-box'>
//               <label for='name'>Name: &nbsp;</label>
//               <span>" . htmlspecialchars($this->getUserName()) . "</span>
//           </div>";
  
//     echo "<div class='input-box'>
//               <label for='number'>Phone Number: &nbsp;</label>
//               <span>" . htmlspecialchars($this->getPhone()) . "</span>
//           </div>";
  
//     echo "<div class='input-box'>
//               <label for='email'>Email: &nbsp;</label>
//               <span>" . htmlspecialchars($this->getEmail()) . "</span>
//           </div>";
  
//     echo "<div class='input-box'>
//               <label for='gender'>Gender: &nbsp;</label>
//               <span>" . htmlspecialchars($this->getGender()) . "</span>
//           </div>";
    
//     echo "</div>"; 
// }


}





?>