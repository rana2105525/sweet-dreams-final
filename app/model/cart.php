<?php
require_once(__ROOT__ . "model/Model.php");

class CartModel extends Model
{
    private $id;
    private $quantity;
    private $user_id;
    private $prod_id;

    function getquantity()
    {
        return $this->quantity;
    }

    function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    function getuser_id()
    {
        return $this->user_id;
    }

    function setUserId($user_id)
    {
       return $this->user_id = $_SESSION["user_id"];
    }

    function getProdId()
    {
        return $this->prod_id;
    }

    function setProdId($prod_id)
    {
        return $this->prod_id = $_SESSION["prod_id"];
    }

    function getId()
    {
        return $this->id;
    }

    public function showInCart($user_id, $prod_id, $quantity) {
        $sql = "SELECT products.Name, products.price, cart.Quantity,products.prod_image,cart.id
                FROM cart
                INNER JOIN product ON products.ID = cart.product_id
                INNER JOIN reg ON reg.id = cart.user_id
                WHERE cart.product_id = $prod_id AND cart.user_id = $user_id";
    
        $result = $this->db->query($sql);
    
        if ($result !== false) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    // Add product to cart
    function addToCart($user_id, $prod_id, $quantity)
    {
        // Assuming you have a cart table with user_id, prod_id, and quantity columns
        $sql = "INSERT INTO cart (user_id, prod_id, quantity) VALUES ('$user_id', '$prod_id', '$quantity')";

        if ($this->db->query($sql) === true) {
            echo "Product added to the cart successfully.";
        } else {
            echo "ERROR: Could not execute $sql. " . $this->db->error;
        }
    }

    // Edit product quantity in the cart
    // function editCart($cart_id, $quantity)
    // {
    //     $sql = "UPDATE cart SET quantity='$quantity' WHERE id='$cart_id'";

    //     if ($this->db->query($sql) === true) {
    //         echo "Cart item updated successfully.";
    //     } else {
    //         echo "ERROR: Could not execute $sql. " . $this->db->error;
    //     }
    // }

    // Delete product from cart
    function deleteFromCart($cart_id)
    {
        $sql = "DELETE FROM cart WHERE id='$cart_id'";

        if ($this->db->query($sql) === true) {
            echo "Product removed from the cart successfully.";
        } else {
            echo "ERROR: Could not execute $sql. " . $this->db->error;
        }
    }
}
?>
