<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
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
    // public function order_item()
    // {
    //    $prod_id=" SELECT * FROM order_items
    //     INNER JOIN products ON order_items.prod_id = products.id";
    //     $order_id=" SELECT * FROM order_items
    //     INNER JOIN orders ON order_items.order_id = orders.id";
    //     $added_at = date('Y-m-d');
    //     $stmt=$this->db->prepare("INSERT INTO order_items(user_id,prod_id,order_id,added_at)VALUES(?,?,?,?)");
    //     $stmt->bind_param("iiiii", $user_id,$prod_id,$order_id,$added_at);
    //     $result = $stmt->execute();
    //     $stmt->close();

    //     return $result;
    // }
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