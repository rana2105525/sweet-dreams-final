<?php

require_once(__ROOT__ . "controller/Controller.php");

class CartController extends Controller {

    public function addToCart() {
        if (isset($_POST['buy_now'])) {
            // Sample data from a hypothetical form or request
            $user_id = $_SESSION['id'];
            $prod_id = $_POST['prod_id'];  // Assuming you have a way to determine the product ID
            $quantity = 1;  // Assuming a default quantity of 1
        
            // Assuming $this->model is an instance of a model class handling database interactions
            $this->model->addToCart($user_id, $prod_id, $quantity);
        } else {
            echo "Error: Missing or invalid data.";
        }
    }

    public function editQuantity() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_quantity'])) {
            $cart_id = $_POST['cart_id'];
            $new_quantity = $_POST['quantity'];
    
            // Validate the quantity if needed
    
            // Assuming $this->model is an instance of a model class handling database interactions
            $this->model->editCartItemQuantity($cart_id, $new_quantity);
    
            // Optionally, you might want to redirect the user or update the UI
            // header("Location: cart.php");
            // exit();
        } else {
            echo "Error: Missing or invalid data.";
            
        }
    }
   


}
?>

