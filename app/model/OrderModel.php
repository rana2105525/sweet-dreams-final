<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");

class OrderModel extends Model
{
    private $id;
    private $user_id;
    private $prod_id;
    private $order_id; 
    private $added_at;
    private $email;
    private $number;
    private $name;
    private $address;
    private $ordered_at;
    private $total_price;

    public function __construct($id,$name="",$email="",$number="",$address="",$ordered_at="",$total_price="") {
      $this->id = $id;
      $this->db = $this->connect();
      if(""===$name){
        $this->readOrder($id);
      }
      else{
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;
        $this->address = $address;
        $this->ordered_at = $ordered_at;
        $this->total_price = $total_price;
      }
  }


  public function readOrder($id){
    echo $this->getName();
    $result = $this->db->query('SELECT * FROM orders where id='.$id);
    if (!$result) {
        die("Error in query: " . $this->db->error);
    }
 
    if ($result->num_rows == 1){
      $row = $this->db->fetchRow();
      $this->name=$row["name"];
      $this->email=$row["email"];
      $this->number=$row["phone"];
      $this->address=$row["address"];
      $this->ordered_at=$row["orderd_at"];
      $this->total_price=$row["total_price"];
    }
    else {
      $this->name = "";
      $this->email = "";
      $this->number = "";
      $this->address = "";
      $this->ordered_at = "";
      $this->total_price = "";
    }
  }


// **Getters**

    public function getId(){
      return $this->id;
    }

    public function getName(){
      return $this->name;
    }

    public function getNumber(){
      return $this->number;
    }

    public function getAddress(){
      return $this->address;
    }

    public function getEmail(){
      return $this->email;
    }
    public function getTotalPrice(){
      return $this->total_price;
    }
    public function getOrderedAt(){
      return $this->ordered_at;
    }

    // **Setters**
    public function setAddress(int $address){
      $this->address = $address;
    }

    public function setName(int $name){
      $this->name = $name;
    }

    public function setNumber(int $number){
      $this->number = $number;
    }

    public function setEmal($email){
      $this->email = $email;
    }
}


?>