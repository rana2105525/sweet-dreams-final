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
            $total_price=100;
            $orderd_at=date('Y-m-d');

        
        

            // Assuming $this->model is an instance of a model class handling database interactions
            $this->model->order($user_id, $name, $email,$phone,$address,$total_price,$orderd_at);
          
            
      
    }
   


}
?>
