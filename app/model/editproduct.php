
<?php 
require_once(__ROOT__ . "model/Model.php");
?>
<?php
class editproducts extends Model {
    private $id;
    private $title;
    private $description;
    private $prod_image;
    private $added_at;
    private $category; 
    private $color;
    private $size;
    private $price;
    private $quantity;

    

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
  public function getColor(){
      return $this->color;
  }    
  public function getSize(){
      return $this->size;
  }
  public function getQuantity(){
      return $this->quantity;
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
  public function setColor($color){
      $this->color = $color;
  }    
  public function setSize($size){
      $this->size = $size;
  }    
  public function setQuantity($quantity){
      $this->size = $quantity;
  }
  function showProducts(){
    $sql = "SELECT * FROM products";
    $db = $this->connect();
    $result = $this->db->query($sql); 
    
    if($result !== false){
        return $result->fetch_all(MYSQLI_ASSOC); 
    } else {
        return []; 
    }
  }
  public function editProduct($id, $title, $price, $description) {
    $query = "UPDATE products SET title = ?, price = ?, description = ? WHERE id = ?";
  
    $db = $this->connect();
    $stmt = $this->db->prepare($query);
  
    // Bind parameters
    $stmt->bind_param('sssi', $title, $price, $description, $id);
  
    // Execute the query
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

  

}