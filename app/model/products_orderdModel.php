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