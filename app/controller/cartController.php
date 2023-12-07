<?php
session_start();
require_once(__ROOT__ . "controller/Controller.php");

class CartController extends controller {

        public function addToCart($user_id, $product_id, $quantity) {
            $this->model->addToCart($user_id, $product_id, $quantity);
            // Add any additional logic or redirection after adding to the cart
        }
    
        public function deleteCart($cart_id) {
            $this->model->deleteFromCart($cart_id);
            // Add any additional logic or redirection after adding to the cart
        }
    }