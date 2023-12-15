<?php

require_once(__ROOT__ . "controller/Controller.php");

class CartController extends Controller {

    public function addToCart() {
        if (isset($_POST['buy_now'])) {
            // Sample data from a hypothetical form or request
            $user_id = $_SESSION['id'];
            $prod_id = $_POST['prod_id'];  // Assuming you have a way to determine the product ID
            $quantity = $_POST['quantity'];  // Assuming a default quantity of 1
        
            // Assuming $this->model is an instance of a model class handling database interactions
            $this->model->addToCart($user_id, $prod_id, $quantity);
        } else {
            echo "Error: Missing or invalid data.";
        }
    }

    public function editQuantity() {
        $product_id = $_POST['id'];
        $new_quantity = $_POST['quantity'];
        $this->model->editCartItemQuantity($product_id, $new_quantity);
        // Add your success or error message handling here
      }
      

    public function deleteCartItem() {
        $this->model->id = $_GET['id'];
        if($this->model->deleteCartItem() === true){
            header("Location:cart.php");
        } else{
            echo "ERROR: Could not able to delete the item. ";
        }
    }
    public function order_item(){
        if(isset($_POST['id'])){
            $prod_id=$_GET['id'];
            $user_id = $_SESSION['id'];
            $added_at = date('Y-m-d H:i:s');
            $this->model->order_item( $user_id, $prod_id, $added_at);
        } 
    }
        }
    ?>
   