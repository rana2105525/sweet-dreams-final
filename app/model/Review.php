<?php
  require_once(__ROOT__ . "model/Model.php");

	class Review extends Model{
    private $id;
    private $user_id;
    private $product_id;
    private $review;


    function __construct($id,$user_id="",$product_id="",$review="") {
      $this->id = $id;
      $this->db = $this->connect();
      if(""===$user_id){
        $this->readReview($id);
      }
      else{
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->review = $review;
      }
    }
  
    public function readReview($id){
          $result = $this->db->query('SELECT * FROM reviews where id='.$id);
          if (!$result) {
              die("Error in query: " . $this->db->error);
          }
  
      if ($result->num_rows == 1){
        $row = $this->db->fetchRow();
        $this->user_id = $row["user_id"];
        $this->product_id = $row["prod_id"];
        $this->review = $row["review"];
      }
      else {
        $this->user_id = "";
        $this->product_id="";
        $this->review = "";
      }
    }
  
      public function deleteReview(){
          $sql="delete from reviews where id=$this->id;";
        if($this->db->query($sql) === false){
          echo "ERROR: " . $this->db->error;
        }
      }
      // Getters
      public function getId(){
          return $this->id;
      }
      public function getUserId(){
          return $this->user_id;
      }
      public function getProductId(){
          return $this->product_id;
      }
      public function getReview(){
        return $this->review;
    }

      // Setters
      public function setReview($review){
          $this->review = $review;
      }
  }
   
  
?>