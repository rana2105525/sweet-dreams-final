<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Review.php");

class Reviews extends Model{
	private $reviews;
	function __construct() {
		$this->fillArray();
	}
 
	function fillArray() {
		$this->reviews = array();
		$this->db = $this->connect();
		$result = $this->readReviews();
		while ($row = $result->fetch_assoc()) {
			array_push($this->reviews, new Review($row["id"]));
		}
	}
 
	public function getReviews() {
		$this->fillArray();  
		return $this->reviews;
	}

    function getReview($id) {
		foreach($this->reviews as $review) {
			if ($id == $review->getID()) {
				return $review;
			}
		}
	}

    function readReviews(){
		$sql = "SELECT * FROM reviews";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}
}
