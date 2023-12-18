<?php
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "model/product.php");
 
class ProductsController extends Controller{
    public function insert() {
        $title=$_POST["title"];
        echo $title;
        $description=$_POST["description"];
        $category=$_POST["category"];
        $price=$_POST["price"];
        $prod_image=$_POST["prod_image"];
        $color=$_POST["color"];
        $size=$_POST["size"];
        $this->model->insertProduct($title,$description,$prod_image,$category,$price,$color,$size);
      
	}
 

  public function edit($id) {
		$this->model->getProduct($id)->editProduct();
	}


	public function delete($id){
		$this->model->getProduct($id)->deleteProduct();
	}

}