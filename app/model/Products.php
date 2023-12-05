<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Product.php");

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
            array_push($this->products, new Product($row["id"],$row["title"],$row["price"],$row["description"],$row["prod_image"],$row["added_at"],$row["category"]));
        }
    }

    function getProducts() {
		return $this->products;
	}


    public function readProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}   
    }

    public function insertProduct($title,$price,$description,$prod_image,$category){
        $sql="INSERT INTO products(title,price,description,prod_image,category)
            VALUES ('$title','$price','$description','$prod_image','$category')";
        if($this->db->query($sql) === true)
            return true;
        else return false;
    }
}