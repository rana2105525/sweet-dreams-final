<?php
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "model/product.php");
 
class ProductsController extends Controller{
    public function insert() {
      $id=$_REQUEST["id"];
      $title=$_REQUEST["title"];
      $description=$_REQUEST["description"];
      $category=$_REQUEST["category"];
      $price=$_REQUEST["price"];
      $prod_image=$_REQUEST["prod_image"];
      $color=$_REQUEST["color"];
      $size=$_REQUEST["size"];
		  $this->model->insertProduct($title,$description,$prod_image,$category,$price,$color,$size);
	}


  public function edit($id) {
		$this->model->getProduct($id)->editProduct();
	}


	public function delete($id){
		$this->model->getProduct($id)->deleteProduct();
	}

}