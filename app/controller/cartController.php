<?php
require_once(__ROOT__ . "controller/Controller.php");

class CartController extends Controller {

  public function addToCart() {
    if(isset($_SESSION['id'], $_REQUEST['prod_name'], $_REQUEST['prod_price'])) {
        $user_id = $_SESSION['id'];
        $name = $_REQUEST['prod_name'];
        $price = $_REQUEST['prod_price'];

        $this->model->addToCart($user_id, $name, $price);
        echo "Product added to cart!";
    } else {
        echo "Error: Missing or invalid data.";
        // You might also want to log this error for further investigation
    }
}
}

