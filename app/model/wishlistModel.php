<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
class wishlistModel extends Model
{
    public $id;
    public $prod_id;
    public $user_id;

    public $title;

    public $price;

    public function __construct() {
        $this->db = new Dbh();

        // Retrieve user ID from session
        $this->user_id = $_SESSION['id'];
    }
    
    public function getId()
    {
        return $this->id;
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
      //  $this->title = $title;
    }

    public function setPrice($price)
    {
       // $this->price = $price;
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

    public function addToWishlist($user_id, $prod_id)
    {
        $stmt = $this->db->prepare("INSERT INTO Wishlist (user_id, prod_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $prod_id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
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
        $WishlistItems = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $WishlistItems;
    }
    public function deleteWishlistItem() {
            
        $sql="delete from Wishlist where id=$this->id;";
        if($this->db->query($sql) === true){
            return true;
        } else{
            echo "ERROR: Could not able to execute $sql. ";
        }
    }
 
    public function deleteALL()
    {
        $sql="delete from Wishlist where user_id=$this->user_id;";
        if($this->db->query($sql) === true){
            return true;
        } else{
            echo "ERROR: Could not able to execute $sql. ";
        }

    }
}
?>