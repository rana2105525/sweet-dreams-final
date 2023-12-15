<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
require_once(__ROOT__ ."model/Collection.php");

class Product_orderedModel extends Model
{
    private $id;
    private $user_id;
    private $prod_id;
    private $order_id;
    private $added_at;
 
    public function __construct() {
        $this->db = new Dbh();

     
    }
  
      public function order_item()
    {
        $user_id=$_SESSION['id'];
        $added_at = date('Y-m-d');
    
        // Fetching product details from the products table
        // $prod_id="SELECT products.id
        // FROM products
        // INNER JOIN order_items ON products.id = order_items.prod_id";
    
        // Fetching order details from the orders table
        // $order_id="SELECT orders.id
        // From orders
        // Inner join order_items ON orders.id=Order_items.order_id;";
        $order_id=1;
        $prod_id=99;
    
        // Inserting order details into the order_items table
      // Inserting order details into the order_items table
// Inserting order details into the order_items table
$stmt = $this->db->prepare("INSERT INTO order_items(user_id,prod_id,order_id,added_at)VALUES(?,?,?,?)");
$stmt->bind_param("iiis", $user_id, $prod_id, $order_id, $added_at);
$result = $stmt->execute();
$stmt->close();
        return $result;
    }

    

    public function showUserProducts($user_id)
    {
        $sql = "SELECT products.id
                FROM products 
                INNER JOIN order_items ON products.id = order_items.prod_id
                WHERE order_items.user_id = ?"; // Use placeholder for parameter
    
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $user_id); // Bind user ID to the query
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Product ID: " . $row["id"] . "<br>";
            }
        } else {
            echo "No products found for user.";
        }
    
        $stmt->close();
    }

}


?>