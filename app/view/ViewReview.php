<?php

require_once(__ROOT__ . "view/View.php");


class ViewReview extends View{
    public function output(){

    }
    	public function review(){
    $str = '
    <link rel="stylesheet" href="../public/css/User/reviews.css">
        <div class="review">';
    
    $reviews = $this->model->review(); // Fetch reviews using the review() function
    
    // Display fetched reviews
    foreach ($reviews as $review) {
        $fullname = $review['fullname']; // Assuming 'fullname' is a column in your database
        $reviewText = $review['review']; // Assuming 'review_text' is a column in your database
    
        $str .= '
            <div class="container">
                <label><strong>' . $fullname . '</strong></label>
                <p>' . $reviewText . '</p>  
                </div>
            ';
    }
    
    $str .= '
      
    </div>';
    
    return $str;
}

    
}