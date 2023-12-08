<?php
require_once(__ROOT__ . "controller/Controller.php");

class CartController extends Controller {

  public function addToCart() {
    if (isset($_POST['add_to_cart'])) {
      $user_id = $_SESSION['id'];
      $name = $_POST['prod_name'];
      $price = $_POST['prod_price'];

      $this->model->addToCart($user_id, $name, $price);
    }
  }
}
