<?php
  require_once(__ROOT__ . "model/Model.php");

	class Review extends Model{
    private $id;
    private $user_id;
    private $user_name;
    private $product_id;
    private $product_title;
    private $image;
    private $review;


    function __construct($id, $user_id = "", $user_name = "", $product_title = "", $product_id = "", $review = "", $image = "")
    {
        $this->id = $id;
        $this->db = $this->connect();
        if ("" === $user_name) {
            $this->readReview($id);
        } else {
            $this->user_id = $user_id;
            $this->user_name = $user_name;
            $this->product_id = $product_id;
            $this->product_title = $product_title;
            $this->review = $review;
            $this->image = $image; // Initialize the image property
        }
      }
  
      public function readReview($id)
      {
          $result = $this->db->query('SELECT review_id, review,user_id,name,prod_id,title,p.prod_image
                FROM reviews r, reg u, products p 
                WHERE r.review_id=' . $id . ' AND u.id= r.user_id AND p.id=r.prod_id;');
  
          if (!$result) {
              die("Error in query: " . $this->db->error);
          }
  
          if ($result->num_rows == 1) {
              $row = $result->fetch_assoc();
              $this->user_id = $row["user_id"];
              $this->user_name = $row["name"];
              $this->image = $row["prod_image"]; // Assign the value to the image property
              $this->product_id = $row["prod_id"];
              $this->product_title = $row["title"];
              $this->review = $row["review"];
          } else {
              $this->user_id = "";
              $this->user_name = "";
              $this->product_id = "";
              $this->product_title = "";
              $this->review = "";
              $this->image = ""; // Set the image property to an empty string
          }
      }
  
      public function deleteReview(){
        $sql="DELETE from reviews where review_id=$this->id;";
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
      public function getUserName(){
        return $this->user_name;
      }
      public function getProductId(){
          return $this->product_id;
      }
      public function getProductTitle(){
        return $this->product_title;
      }
      public function getReview(){
        return $this->review;
      }

      // Setters
      public function setReview($review){
          $this->review = $review;
      }
      public function getImage()
    {
        return $this->image;
    }
  }
   
  
?>