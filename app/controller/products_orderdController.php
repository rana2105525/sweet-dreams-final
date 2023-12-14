<?php
require_once(__ROOT__ . "controller/Controller.php");

class products_orderdController extends Controller
{
    public function insertOrders()
    {
        
    
        $this->model->order_item();
    }
    public function readMyOrders()
    {
        $user_id=$_SESSION['id'];
        $this->model->showUserProducts($user_id);
    }

}

?>
