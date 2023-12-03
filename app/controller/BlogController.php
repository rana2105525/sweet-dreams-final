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
}

?>
