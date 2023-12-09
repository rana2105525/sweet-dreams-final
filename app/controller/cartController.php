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
   


}
?>
