<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/OrderModel.php");

class Orders extends Model{
    private $orders;
    function __construct() {
		$this->fillArray();
	} 

    function fillArray(){
        $this->orders = array();
		$this->db = $this->connect();
		$result = $this->readOrders();
		while ($row = $result->fetch_assoc()) {
			array_push($this->orders, new OrderModel($row["id"]));
		}
    }
    function getOrders(){
        $this->fillArray();  
		return $this->orders;
    }

    function getOrder($id) {
		foreach($this->orders as $order) {
			if ($id == $order->getID()) {
				return $order;
			}
		}
	}

    function readOrders(){
		$sql = "SELECT * FROM orders";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

}