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

        public function addToreview() {
            if (isset($_POST['submitreview'])) {
                // Sample data from a hypothetical form or request
                $user_id = $_SESSION['id'];
                $prod_id = $_POST['prod_id'];
                $review = $_POST['review'];
             
                // Assuming $this->model is an instance of a model class handling database interactions
                $this->model->addToreview($user_id, $prod_id, $review);
            } else {
                echo "Error: Missing or invalid data.";
            }
        }
}

?>
