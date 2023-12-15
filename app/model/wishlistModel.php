<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");


class WishlistModel extends Model
{
    private $id;
    private $prod_id;

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

    public function showInWishlist($user_id) {
        $sql = "SELECT products.title AS name, products.price as price, products.prod_image as image, Wishlist.id as id
                FROM Wishlist
                INNER JOIN products ON products.id = Wishlist.prod_id
                INNER JOIN reg ON reg.id = Wishlist.user_id
                WHERE Wishlist.user_id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $cartItems = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $cartItems;
    }

    public function addToWishlist($user_id, $prod_id)
    {
        $stmt = $this->db->prepare("INSERT INTO cart2 (user_id, prod_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $prod_id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
   

    public function deleteWishlistItem($Wishlist_id)
{
    $sql = "DELETE FROM wishlist WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $wishlist_id);

    // Execute the statement
    $result = $stmt->execute();

    // Check for errors
    if (!$result) {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    return $result;
}

   
}
?>