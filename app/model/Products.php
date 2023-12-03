<?php
require_once(__ROOT__ . "model/Model.php");
class Products extends Model{
    private $id;
    private $title;
    private $description;
    private $prod_image;
    private $added_at;
    private $category;
    private $price;


    public function getProducts() {
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


    
    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getProdImage()
    {
        return $this->prod_image;
    }

    public function getAddedAt()
    {
        return $this->added_at;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getPrice()
    {
        return $this->price;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setProdImage($prod_image)
    {
        $this->prod_image = $prod_image;
    }

    public function setAddedAt($added_at)
    {
        $this->added_at = $added_at;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}