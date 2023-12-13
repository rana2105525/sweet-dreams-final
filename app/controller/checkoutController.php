<?php
require_once(__ROOT__ . "controller/Controller.php");

class checkoutController extends Controller {

    public function checkout() {
        
            // Sample data from a hypothetical form or request
            $user_id = $_SESSION['id'];
            $address=$_POST['address'];
            $card_num = $_POST['card_num'];  // Assuming you have a way to determine the product ID
            $cvc=$_POST['cvc'];
            $exp_date = $_POST['exp_date'];  // Assuming you have a way to determine the product ID
        
        

            // Assuming $this->model is an instance of a model class handling database interactions
            $this->model->checkout($user_id, $address, $card_num,$cvc,$exp_date);
          
            
      
    }
   


}
?>
