<?php

require_once(__ROOT__ . "controller/Controller.php");

class wishlistController extends Controller {

    public function addToWishlist() {
            $user_id = $_SESSION['id'];
            $prod_id = $_POST['prod_id'];  
            $this->model->addToWishlist($user_id, $prod_id);
            echo"added";
    }
        }
    ?>