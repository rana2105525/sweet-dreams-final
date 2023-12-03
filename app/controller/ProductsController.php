<?php

require_once(__ROOT__ . "controller/Controller.php");

class ProductsController extends Controller{

    public function insert() {
		$title = $_REQUEST['title'];
        $price = $_REQUEST["price"];
        $description = $_REQUEST["description"];
        $prod_image = $_REQUEST["prod_image"];
        $category = $_REQUEST["category"];
		$this->model->insertProduct($title,$price,$description,$prod_image,$category);
	}

	public function edit() {
		$title = $_REQUEST['title'];
        $price = $_REQUEST["price"];
        $description = $_REQUEST["description"];
        $prod_image = $_REQUEST["prod_image"];
        $added_at = $_REQUEST["added_at"];
        $category = $_REQUEST["category"];
		$this->model->editProduct($title,$price,$description,$prod_image,$added_at,$category);
	}
	
	public function delete(){
		$this->model->deleteProduct();
	}
}