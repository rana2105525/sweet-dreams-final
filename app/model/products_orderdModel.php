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
  
//       public function order_item()
//     {
//         $user_id=$_SESSION['id'];
//         $added_at = date('Y-m-d');
//         $order_id=1;
//         $prod_id=99;
    
//         // Inserting order details into the order_items table
//       // Inserting order details into the order_items table
// // Inserting order details into the order_items table
// $stmt = $this->db->prepare("INSERT INTO order_items(user_id,prod_id,order_id,added_at)VALUES(?,?,?,?)");
// $stmt->bind_param("iiis", $user_id, $prod_id, $order_id, $added_at);
// $result = $stmt->execute();
// $stmt->close();
//         return $result;
//     }

    

    // public function showUserHistory()
    // {
    //     $sql = "SELECT products.id FROM products
    //     INNER JOIN order_items ON products.id = order_items.prod_id
    //     INNER JOIN reg ON reg.id = order_items.user_id
    //     WHERE order_items.user_id = ?;"; // Use placeholder for parameter
    
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bind_param("s", $user_id); // Bind user ID to the query
    
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             echo "Product ID: " . $row["id"] . "<br>";
    //         }
    //     } else {
    //         echo "No products found for user.";
    //     }
    
    //     $stmt->close();
    // }

      public function showOrders()
    {
        $sql = "SELECT * FROM order_items"; // Use placeholder for parameter
        $result = $this->db->query($sql); 

        if ($result->num_rows > 0) {
           ?>   
           <link rel="stylesheet" href="../public/css/User/reviews.css">               
            <h1 style="color:#F27144;
        text-align:center;
        margin-top:30px;">Ordered Products</h1>
          <?php
            while ($row = $result->fetch_assoc()) {
              ?>
            
              
                  <div class="review">
                    <div class="container">

                        <label><strong><?php
              echo "UserID: " . $row["user_id"] . "
              "?></strong></label>
              <p><?php echo"  OrderID: " . $row["order_id"] .",    ProductID: " . $row["prod_id"] . "<br>";?>
               </p>
               </div>
              </div>
               <?php
             
            }
          }
    }

}


?>