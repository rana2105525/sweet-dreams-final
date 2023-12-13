<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");
class checkoutModel extends Model
{
    private $id;
    private $user_id;
    private $address;
    private $card_num;
    private $cvc;
    private $exp_date;
    public function __construct() {
        $this->db = new Dbh();

        // Retrieve user ID from session
        $this->user_id = $_SESSION['id'];
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getAddress()
    {
        return $this->address;
    }
    public function getACvc()
    {
        return $this->cvc;
    }

    public function getExp_date()
    {
        return $this->exp_date;
    }


    public function getUserId()
    {
        return $_SESSION['id'];
    }

    public function setUserId($user_id)
    {
        $this->user_id = $_SESSION['id'];
    }

    public function getCard()
    {
        return $this->card_num;
    }

    function setAddress($address)
    {
        $this->address = $address;
    }

    function setCard($card_num)
    {
        $this->card_num = $card_num;
    }
    function setCvc($cvc)
    {
        $this->cvc = $cvc;
    }
    function setExp_date($exp_date)
    {
        $this->exp_date = $exp_date;
    }
    // public function showInCart($user_id) {
    //     $sql = "SELECT products.title AS name, products.price as price, cart2.quantity as quantity, products.prod_image as image, cart2.id as id
    //             FROM cart2
    //             INNER JOIN products ON products.id = cart2.prod_id
    //             INNER JOIN reg ON reg.id = cart2.user_id
    //             WHERE cart2.user_id = ?";

    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bind_param("i", $user_id);
    //     $stmt->execute();

    //     $result = $stmt->get_result();
    //     $cartItems = $result->fetch_all(MYSQLI_ASSOC);

    //     $stmt->close();

    //     return $cartItems;
    // }

    public function checkout($user_id, $address, $card_num, $cvc, $exp_date)
    {
        $stmt = $this->db->prepare("INSERT INTO checkout (user_id, address, card_num, cvc, exp_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $user_id, $address, $card_num, $cvc, $exp_date);
        $result = $stmt->execute();
        $stmt->close();
    
        return $result;
    }
    

   
}
?>