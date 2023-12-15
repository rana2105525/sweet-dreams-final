<?php
require_once(__ROOT__ . "model/Model.php");
class Product extends Model {
    private $id;
    private $title;
    private $description;
    private $prod_image;
    private $added_at;
    private $category;
    private $price;

    function __construct($id,$title="",$description="",$prod_image="",$added_at="",$category="",$price="") {
		$this->id = $id;
		$this->db = $this->connect();

		if(""===$title){
			$this->readProduct($id);
		}
		else{
			$this->title = $title;
			$this->description = $description;
			$this->prod_image = $prod_image;
			$this->added_at = $added_at;
			$this->category = $category;
			$this->price = $price;
		}
	}

	public function readProduct($id){
        $result = $this->db->query('SELECT * FROM products where id='.$id);
        if (!$result) {
            die("Error in query: " . $this->db->error);
        }

		if ($result->num_rows == 1){
			$row = $this->db->fetchRow();
            $this->title = $row["title"];
            $this->price = $row["price"];
            $this->description = $row["description"];
            $this->prod_image = $row["prod_image"];
            $this->added_at = $row["added_at"];
            $this->category = $row["category"];
		}
		else {
			$this->title = "";
			$this->price="";
			$this->description = "";
			$this->prod_image = "";
			$this->added_at = "";
			$this->category = "";
		}
	}

    public function deleteProduct(){
        $sql="delete from products where id=$this->id;";
		if($this->db->query($sql) === true){
            header('Location:products.admin.php');
			
		} else{
			echo "ERROR: " . $this->db->error;
		}
    }


    // Getters
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getProdImage(){
        return $this->prod_image;
    }
    public function getAddedAt(){
        return $this->added_at;
    }
    public function getCategory(){
        return $this->category;
    }
    public function getPrice(){
        return $this->price;
    }

    // Setters
    public function setTitle($title){
        $this->title = $title;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setProdImage($prod_image){
        $this->prod_image = $prod_image;
    }
    public function setAddedAt($added_at){
        $this->added_at = $added_at;
    }
    public function setCategory($category){
        $this->category = $category;
    }
    public function setPrice(float $price){
        $this->price = $price;
    }

}
 