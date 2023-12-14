<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
class checkoutModel extends Model
{
    private $id;
    private $user_id;
    private $address;
    private $name;
    private $email;
    private $phone;
    private $total_price;
    private $orderd_at;
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
    
        return $result;
    }
    

   
}
?>