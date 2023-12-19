<?php
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "model/product.php");
 
class ProductsController extends Controller{
    public function insert() { 
        $title=$_REQUEST["title"];
        $description=$_REQUEST["description"];
        $category=$_REQUEST["category"];
        $price=$_REQUEST["price"];
        $color=$_REQUEST["color"];
        $size=$_REQUEST["size"];
        $quantity=$_REQUEST["quantity"];
        
        $prod_image=$_FILES['prod_image'];
        $image_name=$prod_image['name'];
        $image_filetemp=$prod_image['tmp_name'];
        $upload_image='../public/images/'.$image_name; 
        move_uploaded_file($image_filetemp,$upload_image);
        
        

        $this->model->insertProduct($title,$description,$category,$upload_image,$price,$color,$size,$quantity);
      
	} 
 



	public function delete($id){
		$this->model->getProduct($id)->deleteProduct();
	}

}