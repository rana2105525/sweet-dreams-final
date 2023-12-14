<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/UsersController.php");

class ViewOrderedProducts extends View
{
    public function output()
    {

    }
    public function insertOrderedItems()
    {
      $this->model->order_item();
    }
    public function showProducts()
    {
      $user_id=$_SESSION['id'];
      $prod_id=$this->model->showUserProducts($user_id);
   
    }

// public function getOrderedProducts($id)
// {
// $user_id=$_SESSION['id'];
// $prod_id=$_GET['prod_id'];
//   $prodDesc=$this->model->showUserProducts($user_id);
//   foreach ($prodDesc as $id){

//         $str='
   
//         <h1>The product id is: '. $prod_id. '</h1>
  
       
// ';}
// return $str;
// }
}