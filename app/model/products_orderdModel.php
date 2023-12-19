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

    public function showUserOrders() {
      $sql = "SELECT * FROM orders";
      
      $result = $this->db->query($sql); 
      
      

      if ($result->num_rows > 0) {
        ?>
        <link rel="stylesheet" href="../public/css/Admin/orders.css">               
        <h1 style="color:#F27144;
        text-align:center;
        margin-top:30px;">Orders</h1>
        <?php
          while ($row = $result->fetch_assoc()) {
           ?>
            <div class="container">

                <label><strong><?php
            echo "User: " . $row["name"] . "
            "?></strong></label>
           <p><?php echo"    Email: " . $row["email"] .",    phone: " . $row["phone"] .",    Address: " . $row["address"] .",    Total Price: " . $row["total_price"] .",    orderd_at: " . $row["orderd_at"] .""?> <label><strong> <?php echo "Order ID: " . $row["id"] .""?></strong></label><br>
           </p>
           </div>
           <?php
          }
        }
        ?>
        <button style="height: 60px;
    width:60%;
    margin-top: 30px;
    justify-content: center;
    margin-left:300px;
    margin-bottom:30px;
    color: #fff;
    font-size: 1rem;
    font-weight: 400;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    background:#F27144;
    border-radius: 50px">
    <a style="text-decoration:none;
    color:white;"
    
     href='orderdProducts.php'>Show all orders </a></button>   
         
      <?php

      }

    public function showOrders()
    {
        $sql = "SELECT * FROM order_items"; // Use placeholder for parameter
        $result = $this->db->query($sql); 

        if ($result->num_rows > 0) {
           ?>   
           <link rel="stylesheet" href="../public/css/Admin/orders.css">               
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