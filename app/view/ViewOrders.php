<?php

require_once(__ROOT__ . "view/View.php");


class ViewOrders extends View{
  public function output(){

  }
  public function orders()
  {
   
   $this->model->showOrders();

  }
}