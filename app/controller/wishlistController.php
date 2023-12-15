<?php

require_once(__ROOT__ . "controller/Controller.php");

class wishlistController extends Controller {

    public function addToWishlist() {
            $user_id = $_SESSION['id'];
            $prod_id = $_POST['prod_id'];  
            $this->model->addToWishlist($user_id, $prod_id);
            echo"added";
    }
    public function deleteWishlistItem() {
        $this->model->id = $_GET['id'];
        if($this->model->deleteWishlistItem() === true){
            header("Location:wishlist.php");
        } else{
            echo "ERROR: Could not able to delete the item. ";
        }
    }
    public function deleteALL()
    {
        $this->model->id = $_GET['id'];
        if($this->model->deleteALL() === true){
            header("Location:wishlist.php");
            echo"Your wishlist is empty";
        } else{
            echo "ERROR: Could not able to delete the item. ";
        }

    }
        }
    ?>