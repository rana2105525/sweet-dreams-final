<?php
  require_once(__ROOT__ . "model/Model.php");
?>
<?php
class Blog extends Model{
    private $id;
    private $image;
    private $text;

    public function __construct()
    {

      $this->readBlog();
   
        
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getText()
    {
        return $this->text;
    }
    function setImage($image) {
        return $this->image = $image;
      }
      function setText($text) {
        return $this->text = $text;
      }
      function readBlog(){
        $sql = "SELECT * FROM blog";
        $db = $this->connect();
        $result = $db->query($sql);
        if ($result->num_rows == 1){
            $row = $db->fetchRow();
            $this->image = $row["blog_img"];
            $_SESSION["blog_img"]=$row["blog_img"];
            $this->text=$row["blog_text"];
        }
        else {
            $this->image = "";
            $this->text="";
        }
      }
      function blog(){
        $sql = "SELECT * FROM blog";
        $result = $this->db->query($sql); 
        
        if($result !== false){
            return $result->fetch_all(MYSQLI_ASSOC); 
        } else {
            return []; 
        }
    }
    
      }

?>