<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
class checkoutModel extends Model
{
    public $id;
    public $user_id;
    public $address;
    public $name;
    public $email;
    public $phone;
    public $total_price;
    public $orderd_at;
    public function __construct() {
        $this->db = new Dbh();

        // Retrieve user ID from session
        $this->user_id = $_SESSION['id'];
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function getOrdered_at()
    {
        return $this->orderd_at;
    }

    public function getAddress()
    {
        return $this->address;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getTotal_price()
    {
        return $this->total_price;
    }


    public function getUserId()
    {
        return $_SESSION['id'];
    }

    public function setUserId($user_id)
    {
        $this->user_id = $_SESSION['id'];
    }

    public function getPhone()
    {
        return $this->phone;
    }

    function setAddress($address)
    {
        $this->address = $address;
    }

    function setName($name)
    {
        $this->name = $name;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setPhone($phone)
    {
        $this->phone = $phone;
    }
    function setOrderd_at($orderd_at)
    {
        $this->orderd_at= getTodayDate(); 
    }
    function setTotal_price($total_price)
    {
        $this->total_price= $total_price; 
    }
    function setID($id)
    {
        $this->id=$id;
    }
    public function showInCart($user_id) {
      $sql = "SELECT products.id AS prod_id ,products.title AS name, products.price as price, cart2.quantity as quantity, products.prod_image as image, cart2.id as id
              FROM cart2
              INNER JOIN products ON products.id = cart2.prod_id
              INNER JOIN reg ON reg.id = cart2.user_id
              WHERE cart2.user_id = ?";

      $stmt = $this->db->prepare($sql);
      $stmt->bind_param("i", $user_id);
      $stmt->execute();

      $result = $stmt->get_result();
      $cartItems = $result->fetch_all(MYSQLI_ASSOC);

      $stmt->close();

      return $cartItems;
  }
  public function order($user_id, $name, $email, $phone, $address,$total_price)
  {
    // Get today's date
    $orderd_at = date('Y-m-d');
  
    // Prepare the statement
    $stmt = $this->db->prepare("INSERT INTO orders (user_id, name,email,phone,address,total_price,orderd_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
  
    // Bind parameters including $orderd_at
    $stmt->bind_param("issssss", $user_id, $name,$email,$phone,$address,$total_price,$orderd_at);
      $result = $stmt->execute();
      $stmt->close();
  
      $sql = "SELECT ID FROM orders
      ORDER BY ID DESC
      LIMIT 1;";
      $result = $this->db->query($sql);
      $row = $result->fetch_assoc()["ID"];
      return $row;
  }
 
  public function order_item( $user_id,$order_id, $prod_id)
  {
      
      $stmt = $this->db->prepare("INSERT INTO order_items(user_id,order_id,prod_id) VALUES (?,?,?)");
      $stmt->bind_param("iii",$user_id, $order_id, $prod_id);
      $result = $stmt->execute();
      $stmt->close();
      return $result;
  }
  
  

  
   
}
?>