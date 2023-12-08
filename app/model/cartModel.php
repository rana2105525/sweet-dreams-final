<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
class CartModel extends Model
{
    private $id;
    private $name;
    private $price;
    private $user_id;
    public function __construct() {
        $this->db = new Dbh();

        // Retrieve user ID from session
        $this->user_id = $_SESSION['id'];
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUserId()
    {
        return $_SESSION['id'];
    }

    public function setUserId($user_id)
    {
        $this->user_id = $_SESSION['id'];
    }

    public function getPrice()
    {
        return $this->price;
    }

    function setTitle($title)
    {
        $this->title = $title;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    // Add product to cart
    function addToCart($user_id, $name, $price) {
      // Prepare and execute SQL statement with placeholders
      $stmt = $this->db->prepare("INSERT INTO cart (user_id, prod_name, prod_price) VALUES (?, ?, ?)");
      
      // Bind parameters to the prepared statement
      $stmt->bind_param("isd", $user_id, $name, $price);
  
      // Execute the statement
      if ($stmt->execute() === true) {
          // Handle successful addition
          echo "Product added to cart!";
      } else {
          // Handle error
          echo "Error adding product to cart.";
      }
  
      $stmt->close();
  }
}
?>
      
      
    



