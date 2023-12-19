<?php
require_once(__ROOT__ . "controller/Controller.php");

class BlogController extends Controller
{
    public function Read()
    {
        $image = $_REQUEST['blog_img'];
        $text = $_REQUEST['blog_text'];
        $this->model->blog($image,$text);
    }

    public function insert(){
        $blogText=$_REQUEST["btext"];
        
        $blog_image=$_FILES['blog_img'];
        $image_name=$blog_image['name'];
        $image_filetemp=$blog_image['tmp_name'];
        $upload_image='../public/images/'.$image_name; 
        move_uploaded_file($image_filetemp,$upload_image);

    
        $this->model->insertBlog($blogText,$upload_image);
    }
}
 
?>
