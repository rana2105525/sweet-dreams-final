<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php

class Collection extends Model
{
  private $id;
    private $title;
    private $price;
    private $description;
    private $image;
    private $name;

    public function __construct()
    {
      
      $this->readCollection();
    
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getDesc()
    {
        return $this->description;
    }
    public function getImage()
    {
        return $this->image;
    }
    function setTitle($title) {
      return $this->title = $title;
    }
    function setPrice($price) {
      return $this->price = $price;
    }
    function setDesc($description) {
      return $this->description = $description;
    }
    function setImage($image) {
      return $this->image = $image;
    }
    function setName($name) {
      return $this->name = $name;
    }
    function readCollection(){
      $sql= "SELECT * FROM products";
      $db = $this->connect();
      $result = $db->query($sql);
      if ($result->num_rows == 1){
          $row = $db->fetchRow();
          $this->title = $row["title"];
          $_SESSION["title"]=$row["title"];
          $this->price=$row["price"];
          $this->description=$row["description"];
          $this->image=$row["prod_image"];
      }
      else{
        $this->title = "";
        $this->price="";
        $this->description = "";
        $this->image="";
      }
    }
    function collectionsSummer(){
      $sql = "SELECT * FROM products where category='Summer_Collection'";
      $result = $this->db->query($sql); 
      
      if($result !== false){
          return $result->fetch_all(MYSQLI_ASSOC); 
      } else {
          return []; 
      }
    }
    function collectionsWinter(){
      $sql = "SELECT * FROM products where category='Winter_Collection'";
      $result = $this->db->query($sql); 
      
      if($result !== false){
          return $result->fetch_all(MYSQLI_ASSOC); 
      } else {
          return []; 
      }
    }
    function collectionsBundleAndSave(){
      $sql = "SELECT * FROM products where category='Bundle'";
      $result = $this->db->query($sql); 
      
      if($result !== false){
          return $result->fetch_all(MYSQLI_ASSOC); 
      } else {
          return []; 
      }
    }

    function readDesc() {
      if (isset($_POST['add_to_description'])) {
        $product_id = $_POST['product_id'];
        // Retrieve the product attributes from the database based on the product ID
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $this->db->query($sql); 
        $row = mysqli_fetch_assoc($result);
        $_SESSION['product_description'] = $row;
    }

    if (isset($_SESSION['product_description'])) {
      $product = $_SESSION['product_description'];
  }

  return $product;
}
public function addToCart($user_id, $prod_id, $quantity)
    {
        $stmt = $this->db->prepare("INSERT INTO cart2 (user_id, prod_id, quantity) VALUES (?, ?, ?)");

        $stmt->bind_param("iii", $user_id, $prod_id, $quantity);

        if ($stmt->execute() === true) {
          
        } else {
            echo "Error adding product to cart: " . $stmt->error;
        }

        $stmt->close();
    }

}

?>