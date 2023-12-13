<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
class OrderModel extends Model
{
    private $id;

 
    public function __construct() {
        $this->db = new Dbh();

     
    }

    public function showOrders() {
        $sql = "SELECT reg.name, reg.phone, checkout.id, checkout.user_id, checkout.address
        FROM reg 
        INNER JOIN checkout ON reg.id = checkout.user_id ";

        $stmt="SELECT products.title, cart2.prod_id FROM products
        INNER JOIN cart2 ON products.id=cart2.prod_id";
        
        $result = $this->db->query($sql); 
        
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
             ?>   
                <link rel="stylesheet" href="../public/css/User/reviews.css">
        <div class="review">
                 <div class="container">
                <label><strong>
                    <?php
              echo "User: " . $row["name"] . ",    Phone: " . $row["phone"] .",    Address: " . $row["address"] .",    Order ID: " . $row["id"] . "<br>";
              ?>
              </strong></label> 
              <button>Approved</button>
              <button>Shipped</button> </div> 
            </div>
              <?php
            }
          }
        //   $result = $this->db->query($stmt); 
        
        //   if ($result->num_rows > 0) {
        //       while ($row = $result->fetch_assoc()) {
                // ?>
                 <!-- <div class="container">
                <p> -->
                    <?php
                    
                // echo "Product title: " . $row["title"] ."<br>";
                ?>
              <!-- </p>
              </div> -->
        
             
              
          
               
             <?php
            }
        
    }
?>


?>