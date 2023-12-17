<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "view/partials/sidebar.admin.php");

class ViewOrders extends View{
  public function output(){
    $str="<div class='component'>";
		echo sidebar();
		$str.= "<div class='content'>
		<div id='header'><h2>All Orders</h2></div>";
		$str.="<div class='tablecont'>";
		$str.="<table>";
    $str.="<thead class='tablehead'>";
		$str.="<tr>";
    $str.="<th class = 'tableHeader'>#Order ID</th>";
    $str.="<th class = 'tableHeader'>User Name</th>";
    $str.="<th class = 'tableHeader'>User Email</th>";
    $str.="<th class = 'tableHeader'>User &nbsp; Phone Number</th>";
    $str.="<th class = 'tableHeader'>User Address</th>";
    $str.="<th class = 'tableHeader'>Total Price</th>";
    $str.="<th class = 'tableHeader'>Ordered At</th>";
    $str.="</tr>";
    $str.="</thead>";
    $str.="<tbody>";

		foreach($this->model->getOrders() as $order){
			$str.="<tr>";
			$str.="<td class = 'cell'>" . $order->getId() ."</td> ";
			$str.="<td class = 'cell'>" . $order->getName() ."</td> ";
			$str.="<td class = 'cell'>" . $order->getEmail() ."</td> ";
			$str.="<td class = 'cell'>" . $order->getNumber() ."</td> ";
			$str.="<td class = 'cell'>" . $order->getAddress() ."</td> ";
			$str.="<td class = 'cell'>" . $order->getTotalPrice() ."</td> ";
			$str.="<td class = 'cell'>" . $order->getOrderedAt() ."</td> ";
		}

    $str.="</tbody>";
		$str.="</table>";
    $str.="</div>";
    $str.="</div>";
    $str.="</div>";

		return $str;	  
  } 
}