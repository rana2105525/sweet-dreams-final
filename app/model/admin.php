<?php 
require_once(__ROOT__ . "model/Model.php");
class admins extends Model
{
private $ID;
private $UserName;
private $Phone;
private $Email;
private $Password;
private $Gender;

function __construct($id,$name="",$email="",$phone="",$password="",$gender="") {
    $this->ID = $id;
	$this->db = $this->connect();

    if(""===$name){
      $this->readAdmin($id);
    }else{
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

function readAdmin($id){
    $sql = "SELECT * FROM admins where id=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
      $row = $db->fetchRow();
      $this->UserName = $row["UserName"];
		  $_SESSION["UserName"]=$row["UserName"];
      $this->Email=$row["Email"];
      $this->Phone=$row["Phone"];
	  $this->Password=$row["Password"];
	  $this->Gender = $row["Gender"];
    }
    else {
      $this->UserName = "";
      $this->Email="";
      $this->Phone="";
	  $this->Password="";
	  $this->Gender = "";
    }
  }
  function adminLogin($email, $password)
  {
      $sql = "SELECT * FROM admins WHERE Email='$email'";
      $result = $this->db->query($sql);
      
      if ($result && $result->num_rows === 1) {
          $row = $result->fetch_assoc();
          $storedPassword = $row['Password'];
          
          if (password_verify($password, $storedPassword)) {
              
              $_SESSION["UserName"] = $row['UserName'];
              return new admins($row['ID']);
          } else {
              return null; 
          }
      } else {
          return null; 
      }
  }
  

function addAdmin($Username,$Phone,$Email,$Password,$Gender)
{
    $sql = "INSERT INTO admins (Username, Phone, Email, Password, Gender) VALUES ('$Username', '$Phone', '$Email', '$Password', '$Gender')";
    if(mysqli_query($GLOBALS['conn'],$sql))
    return true;
    else
    return false;
}

function editAdmin($name, $phoneNumber, $email, $password, $gender)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE admins SET Username='$name', Phone='$phoneNumber', Email='$email', Password='$hashedPassword', Gender='$gender' WHERE ID='$this->ID'";
    if($this->db->query($sql) === true){
        echo "updated successfully.";
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

function displayAdminInfo($admin) {
    echo "<div class='admin-info'>";
    echo "<div class='input-box'>
              <label for='name'>Name: &nbsp;</label>
              <span>" . htmlspecialchars($admin->getUserName()) . "</span>
          </div>";
  
    echo "<div class='input-box'>
              <label for='number'>Phone Number: &nbsp;</label>
              <span>" . htmlspecialchars($admin->getPhone()) . "</span>
          </div>";
  
    echo "<div class='input-box'>
              <label for='email'>Email: &nbsp;</label>
              <span>" . htmlspecialchars($admin->getEmail()) . "</span>
          </div>";
  
    echo "<div class='input-box'>
              <label for='gender'>Gender: &nbsp;</label>
              <span>" . htmlspecialchars($admin->getGender()) . "</span>
          </div>";
    
    echo "</div>"; 
}


}






?>