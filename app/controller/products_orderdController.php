<?php
require_once(__ROOT__ . "controller/Controller.php");

class products_orderdController extends Controller
{
    public function insertOrders()
    {
        $id = $_REQUEST['id'];
        $user_id=$_SESSION['id'];
        $prod_id=$_REQUEST['prod_id'];
        $order_id=$_REQUEST['order_id'];
        $added_at=date('Y-m-d');
        $this->model->order_item($user_id,$prod_id,$order_id,$added_at);
    }
    public function readMyOrders()
    {
        $user_id=$_SESSION['id'];
        $this->model->showUserProducts($user_id);
    }
}

?>
