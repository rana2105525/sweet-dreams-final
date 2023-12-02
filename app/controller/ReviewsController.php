<?php
require_once(__ROOT__ . "controller/Controller.php");

class ReviewsController extends Controller
{
    public function Read()
    {
        $fullname = $_REQUEST['fullname'];
        $review = $_REQUEST['review'];
        $this->model->review($fullname,$review);
        }
}

?>
