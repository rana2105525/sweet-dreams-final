<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class Product extends Model {
    private $id;
    private $title;
    private $description;
    private $prod_image;
    private $added_at;
    private $category;
    private $price;
  

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
    public function setPrice($price){
        $this->price = $price;
    }

    function readProduct($id){
        $sql = "SELECT * FROM products where ID=".$id;
        $db = $this->connect();
        $result = $db->query($sql);
        if ($result->num_rows == 1){
            $row = $db->fetchRow();
            $this->title = $row["title"];
            $this->price=$row["price"];
            $this->description = $row["description"];
            $this->prod_image = $row["prod_image"];
            $this->added_at = $row["added_at"];
            $this->category = $row["category"];
        }
        else {
            $this->title = "";
            $this->price = "";
            $this->description = "";
            $this->prod_image = "";
            $this->added_at = "";
            $this->category = "";
        }
    }  
    
    //edit & delete
}