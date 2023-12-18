<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/product.php");
 
class Products extends Model{ 
	private $products; 
	function __construct() {
		$this->fillArray();
	}
  
	function fillArray() {
		$this->products = array();
		$this->db = $this->connect();
		$result = $this->readProducts();
		while ($row = $result->fetch_assoc()) {
			array_push($this->products, new Product($row["id"]));
		}
	} 
 
	function getProducts() {
		$this->fillArray();  
		return $this->products;
	}

	function getProduct($id) {
		foreach($this->products as $product) {
			if ($id == $product->getID()) {
				return $product;
			}
		}
	}

	function readProducts(){
		$sql = "SELECT * FROM products";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

	function insertProduct($title,$description,$prod_image,$category,$price,$color,$size){
		$sql = "INSERT INTO products (title, description, price,category,size,color,prod_imag)
		 VALUES ('$title', '$description', '$price','$category','$size','$color','$prod_image')";
		if($this->db->query($sql) === true){
			$this->fillArray();
		} 
		else{
            die("Error in query: " . $this->db->error);
		}
	}
}