<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class User extends Model {
    private $id;
    private $name;
    private $email;
    private $phone;
	private $password;
    private $birth;
    private $gender;

  function __construct($id,$name="",$email="",$phone="",$password="",$birth="",$gender="") {
    $this->id = $id;
	    $this->db = $this->connect();

    if(""===$name){
      $this->readUser($id);
    }else{
      $this->name = $name;
      $this->email=$email;
      $this->phone=$phone;
	  $this->password=$password;
      $this->birth = $birth;
      $this->gender = $gender;
    }
  }

  function getName() {
    return $this->name;
  }
  function setName($name) {
    return $this->name = $name;
  }
  function getEmail() {
    return $this->email;
  }
  function setEmail($email) {
    return $this->email = $email;
  }
  function getPhone() {
    return $this->phone;
  }
  function setPhone($phone) {
    return $this->phone = $phone;
  }
   function getPassword() {
    return $this->password;
  }
  function setPassword($password) {
    return $this->password = $password;
  }
  
  function getBirth() {
    return $this->birth;
  }
  function setBirth($birth) {
    return $this->birth = $birth;
  }
  
  function getGender() {
    return $this->gender;
  }
  function setGender($gender) {
    return $this->gender = $gender;
  }

  function getID() {
    return $this->id;
  }

  function readUser($id){
    $sql = "SELECT * FROM reg where id=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->name = $row["name"];
		$_SESSION["name"]=$row["name"];
        $this->email=$row["email"];
        $this->phone=$row["phone"];
		$this->password=$row["password"];
        $this->birth = $row["birth"];
		$this->gender = $row["gender"];
    }
    else {
        $this->name = "";
        $this->email="";
        $this->phone="";
		$this->password="";
        $this->birth = "";
		$this->gender = "";
    }
  }
  function editUser($name, $email){
    $sql = "update reg set name='$name',email='$email' where id=$this->id;";
      if($this->db->query($sql) === true){
          echo "updated successfully.";
          $this->readUser($this->id);
      } else{
          echo "ERROR: Could not able to execute";
      }

}
}