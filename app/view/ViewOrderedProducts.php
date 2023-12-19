<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/partials/sidebar.admin.php");


class ViewOrderedProducts extends View
{
 public function output()
{

}
public function showProducts()
{     
    

      echo '<link rel="stylesheet" href="../public/css/Admin/sidebar.css" />';
      echo sidebar();
        $this->model->showOrders();
      
      
}
public function showUserProducts()
{
      echo '<link rel="stylesheet" href="../public/css/Admin/sidebar.css" />';
      echo sidebar();
      $this->model->showUserOrders();
}

}