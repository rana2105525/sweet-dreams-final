<?php
require_once(__ROOT__ . "controller/Controller.php");

class checkoutController extends Controller {

    public function checkout() {
        
            // Sample data from a hypothetical form or request

            $user_id = $_SESSION['id'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $total_price=$_SESSION['total_price'];
            $orderd_at=date('Y-m-d');
            // Assuming $this->model is an instance of a model class handling database interactions
            $orderID = $this->model->order($user_id, $name, $email,$phone,$address,$total_price,$orderd_at);
            $user_id = $_SESSION['id'];

    $cartProducts = $this->model->showInCart($user_id);
    foreach ($cartProducts as $cartProduct) {
      $prod_id=$cartProduct['prod_id'];
      $this->model->order_item($user_id,$orderID,$prod_id);
    }
    
      
    }
    
    public function deleteALL()
    {
        $this->model->id = $_GET['id'];
        if($this->model->deleteALL() === true){
            header("Location:checkout.php");
            echo"Your cart is empty";
        } else{
            echo "ERROR: Could not able to delete the item. ";
        }

    }


}
?>
