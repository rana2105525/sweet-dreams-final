<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Review.php");
 

class Reviews extends Model {
    private $reviews;

    function __construct() {
        $this->fillArray();
    }

    function fillArray() {
        $this->reviews = array();
        $this->db = $this->connect();
        $result = $this->readReviews();

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->reviews, new Review($row['review_id']));
            }
        } else {
            // Handle the case where the query fails
            // You can log an error, display a message, or take appropriate action
            // For now, let's assume you want to display a message
            echo "";
        }
    }

    function getReviews() {
        $this->fillArray();
        return $this->reviews;
    }

    function getReview($id) {
        foreach ($this->reviews as $review) {
            if ($id == $review->getID()) {
                return $review;
            }
        }
    }

    function readReviews() {
        $sql = "SELECT review_id, review, user_id, name, prod_id, title, p.prod_image
                FROM reviews r, reg u, products p 
                WHERE u.id = r.user_id AND p.id = r.prod_id;";

        $result = $this->db->query($sql);
        return $result;
    }
}
?>
