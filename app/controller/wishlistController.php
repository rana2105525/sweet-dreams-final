<?php
require_once(__ROOT__ . "controller/Controller.php");

class wishlistController extends Controller {

    public function addTowhishlist() {
        if (isset($_POST[' Add_to_Wishlist'])) {
            // Sample data from a hypothetical form or request
            $user_id = $_SESSION['id'];
            $prod_id = $_POST['prod_id'];  // Assuming you have a way to determine the product ID
           

           
            $this->model->addToWishlist($user_id, $prod_id);
          
            
        } else {
            echo "Error: Missing or invalid data.";
            
        }
    }
   

    public function deleteWishlistItem() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_wishlist'])) {
            $wishlist_id = $_POST['wishlist_id'];
            $this->model->deleteCartItem($wishlist_id);
            
        } else {
            echo "Error: Missing or invalid data.";
        }
    }
    
}
?>
   
