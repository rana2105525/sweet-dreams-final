<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
class CartModel extends Model
{
    private $id;
    private $prod_id;
    private $quantity;
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

    // public function getName()
    // {
    //     return $this->name;
    // }

    public function getUserId()
    {
        return $_SESSION['id'];
    }

    public function setUserId($user_id)
    {
        $this->user_id = $_SESSION['id'];
    }

    // public function getPrice()
    // {
    //     return $this->price;
    // }

    function setTitle($title)
    {
        $this->title = $title;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }
    public function showInCart($user_id) {
        $sql = "SELECT products.title AS name, products.price as price, cart2.quantity as quantity, products.prod_image as image, cart2.id as id
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

    public function addToCart($user_id, $prod_id, $quantity)
    {
        $stmt = $this->db->prepare("INSERT INTO cart2 (user_id, prod_id, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $user_id, $prod_id, $quantity);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
    public function editCartItemQuantity($cart_id, $new_quantity) {
        // Assuming $this->db is an instance of a database connection (e.g., mysqli or PDO)
        
        // Use parameterized query to prevent SQL injection
        $sql = "UPDATE cart2 SET quantity = ? WHERE id = ?";
    
        // Prepare the statement
        $stmt = $this->db->prepare($sql);
    
        // Bind parameters
        $stmt->bind_param("ii", $new_quantity, $cart_id);
    
        // Execute the statement
        $result = $stmt->execute();
    
        // Close the statement
        $stmt->close();
    
        return $result;
    }

    public function deleteCartItem($cart_id) {
            
        $sql = "DELETE FROM cart2 WHERE id = ?";
    
        // Prepare the statement
        $stmt = $this->db->prepare($sql);
    
        // Bind parameter
        $stmt->bind_param("i", $cart_id);
    
        // Execute the statement
        $result = $stmt->execute();
    
        // Close the statement
        $stmt->close();
    
        return $result;
    }
      
}
?>