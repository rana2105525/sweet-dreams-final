<?php
require_once(__ROOT__ . "controller/Controller.php");

class ReviewsController extends Controller{
	public function delete($id){
		$this->model->getReview($id)->deleteReview();
	}

}

?>
 