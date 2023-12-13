<?php
require_once(__ROOT__ . "controller/Controller.php");

class OrdersController extends Controller
{
    public function Read()
    {
        $id = $_REQUEST['id'];
        $address = $_REQUEST['address'];
        $this->model->showOrders($id,$address);
        }
}

?>
