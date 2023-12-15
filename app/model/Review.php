<?php 
  require_once(__ROOT__ . "model/Model.php");
?>
<?php
class Review extends Model{
    private $id;
    private $fullname;
    private $review;

    public function __construct()
    {

      $this->readReview();
  
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function getReview()
    {
        return $this->review;
    }
    function setName($fullname) {
        return $this->fullname = $fullname;
      }
      function setReview($review) {
        return $this->review = $review;
      }
      function readReview(){
        $sql = "SELECT * FROM reviews";
        $db = $this->connect();
        $result = $db->query($sql);
        if ($result->num_rows == 1){
            $row = $db->fetchRow();
            $this->fullname = $row["fullname"];
            $_SESSION["fullname"]=$row["fullname"];
            $this->review=$row["review"];
        }
        else {
            $this->fullname = "";
            $this->review="";
        }
      }
      function review(){
        $sql = "SELECT * FROM reviews";
        $result = $this->db->query($sql); 
        
        if($result !== false){
            return $result->fetch_all(MYSQLI_ASSOC); 
        } else {
            return []; 
        }
    }
    
      }

?>