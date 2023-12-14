<?php
require_once(__ROOT__ . "controller/Controller.php");

class OrdersController extends Controller
{
    public function ReadOrders()
    {
        $id = $_REQUEST['id'];
        $user_id=$_SESSION['id'];
        $prod_id=$_REQUEST['prod_id'];
        $order_id=$_REQUEST['order_id'];
        $added_at=date('Y-m-d');

        $this->model->showOrders();
        }
}

?>
