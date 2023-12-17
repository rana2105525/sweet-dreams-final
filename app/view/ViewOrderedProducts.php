<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/UsersController.php");

class ViewOrderedProducts extends View
{
 public function output()
{

}
public function showProducts()
{
      $this->model->showOrders();
}

}