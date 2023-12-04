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

    public function __construct()
    {
      
      $this->readCollection();
    
        
    }
    public function getId()
    {
        return $this->id;
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

}
?>