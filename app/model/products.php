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
		
		if($result !== false) { // Check if result is valid
			while ($row = $result->fetch_assoc()) {
				array_push($this->products, new Product($row["id"]));
			}
		} else {
			echo "Failed to retrieve products from the database.";
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
 
	function insertProduct($title,$description,$category,$prod_image,$price,$color,$size,$quantity){
        $stmt = $this->db->prepare("INSERT INTO products
		 (title, description, category,prod_image, price,color,size,quantity)
		  VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssdssi",$title, $description, $category,$prod_image, $price,$color,$size,$quantity);


		if ($stmt->execute() === true) {
            // Successful insertion
            $this->fillArray();
            return true;
        } else {
            // Error occurred
            echo "ERROR: Could not able to execute $stmt->error";
            return false;
        }
      //  $stmt->close();
	}
}