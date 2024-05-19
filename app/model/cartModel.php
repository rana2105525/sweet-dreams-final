<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
class CartModel extends Model
{
    public $id;
    public $prod_id;
    public $quantity;
    public $title;
    public $price;
    public $color;
    public $size;
    public $user_id;
    public function __construct() {
        $this->db = new Dbh();

        // Retrieve user ID from session
        $this->user_id = $_SESSION['id'];
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function get_color()
    {
      return $this->color;
    }
    public function get_size()
    {
      return $this->size;
    }
    public function set_color($color)
    {
      return $this->color=$color;
    }
    public function set_size($size)
    {
      return $this->size=$size;
    }
    public function getUserId()
    {
        return $_SESSION['id'];
    }

    public function setUserId($user_id)
    {
        $this->user_id = $_SESSION['id'];
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getprodId()
    {
        return $this->prod_id;
    }
    public function setProd_id($prod_id)
    {
        $this->prod_id = $prod_id;

    }
    public function setID($id)
    {
        $this->id=$id;
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

    public function addToCart($user_id, $prod_id,$color,$size, $quantity)
    {
        $stmt = $this->db->prepare("INSERT INTO cart2 (user_id, prod_id,color,size, quantity) VALUES (?, ?, ?,?,?)");

        $stmt->bind_param("iissi", $user_id, $prod_id,$color,$size, $quantity);

        if ($stmt->execute() === true) {
          
        } else {
            echo "Error adding product to cart: " . $stmt->error;
        }

        $stmt->close();
    }

    public function order_item( $user_id, $prod_id, $added_at)
    {
        $added_at = date('Y-m-d H:i:s');
        $stmt = $this->db->prepare("INSERT INTO order_items(user_id,prod_id,added_at) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $user_id, $prod_id, $added_at);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
   

    public function editCartItemQuantity($product_id,$new_quantity) {
        $sql = "UPDATE cart2 SET quantity = $new_quantity WHERE id = $product_id";
        if($this->db->query($sql) === true){
            echo "updated quantity successfuly";
        } else{
            echo "ERROR: Could not able to execute $sql.";
        }
    }

    public function deleteCartItem() {
            
        $sql="delete from cart2 where id=$this->id;";
        if($this->db->query($sql) === true){
            return true;
        } else{
            echo "ERROR: Could not able to execute $sql. ";
        }
    }
    public function deleteALL()
    {
        // Assuming you have started the session elsewhere in your code
        $user_id = $_SESSION["id"];
    
        // Prepare the SQL statement
        $sql = "DELETE FROM cart2 WHERE user_id = ?";
    
        // Prepare the statement
        $stmt = $this->db->prepare($sql);
    
        // Bind parameters
        $stmt->bind_param("i", $user_id);
    
        // Execute the statement
        if ($stmt->execute()) {
            // Query executed successfully
            $stmt->close();
            return true;
        } else {
            // Error handling
            echo "ERROR: Could not able to execute $sql. " . $stmt->error;
        }
    
        // Close the statement
        $stmt->close();
    }
    

 
}
?>