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
          $this->readUser($this->id);
      } else{
          echo "ERROR: Could not able to execute";
      }
}
function deleteUser(){
  $sql="delete from reg where id=$this->id;";
  if($this->db->query($sql) === false){
      echo "ERROR: Could not able to execute $sql. ";
  }
} 
function deleteMyAccount(){
  $sql="delete from reg where id=$this->id;";
  if($this->db->query($sql) === true){
          return true;
      } else{
          echo "ERROR: Could not able to execute $sql. ";
      }
    }
public function showUserHistory($user_id)
{
    $sql = "SELECT products.id,products.title,products.prod_image FROM products
    INNER JOIN order_items ON products.id = order_items.prod_id
    INNER JOIN reg ON reg.id = order_items.user_id
    WHERE order_items.user_id = ?;"; // Use placeholder for parameter

    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $user_items = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $user_items;

}
public function ShowProducts(){
  $sql = "SELECT id, title, price, prod_image FROM products ORDER BY id DESC LIMIT 3;";
  $result = $this->db->query($sql); 
        
  if($result !== false){
      return $result->fetch_all(MYSQLI_ASSOC); 
  } else {
      return []; 
  }
}
}