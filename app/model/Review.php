<?php
  require_once(__ROOT__ . "model/Model.php");
?>
<?php
class Review extends Model
{
    private $id;
    private $fullname;
    private $review;

    public function __construct($id, $fullname="", $review="")
    {
        $this->id = $id;
	    $this->db = $this->connect();

    if(""===$fullname){
      $this->readReview($id);
     } else{
        $this->id = $id;
        $this->fullname = $fullname;
        $this->review = $review;
      }
        
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
      function readReview($id){
        $sql = "SELECT * FROM reviews where id=".$id;
        $db = $this->connect();
        $result = $db->query($sql);
        if ($result->num_rows == 1){
            $row = $db->fetchRow();
            $this->fullanme = $row["fullname"];
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
        $result = $this->db->query($sql); // Assuming $this->db is your database connection object
        
        if($result !== false){
            return $result->fetch_all(MYSQLI_ASSOC); // Returning all reviews as an associative array
        } else {
            return []; // Return an empty array if query fails or no reviews found
        }
    }
    
      }

?>