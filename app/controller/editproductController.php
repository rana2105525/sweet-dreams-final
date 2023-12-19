<?php
require_once(__ROOT__ . "controller/Controller.php");

class editproductController extends Controller
  
  
{
  public function edit(){
    $id=$_GET["id"];
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $price=$_REQUEST['price'];

    $this->model->editProduct($id, $title, $price, $description);

  }
}