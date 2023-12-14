<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
class OrderModel extends Model
{
    private $id;
    private $user_id;
    private $prod_id;
    private $order_id;
    private $added_at;
 
    public function __construct() {
        $this->db = new Dbh();

     
    }
    public function showOrders() {
      $sql = "SELECT * FROM orders";
      
      $result = $this->db->query($sql); 
      
      
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "User: " . $row["name"] . ",    Email: " . $row["email"] .",    phone: " . $row["phone"] .",    Address: " . $row["address"] .",    Total Price: " . $row["total_price"] .",    orderd_at: " . $row["orderd_at"] .",    Order ID: " . $row["id"] . "<br>";
           
          }
        }
      }
}


?>