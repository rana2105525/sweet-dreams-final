<?php
require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "view/partials/footer.php");


class ViewUserReview extends View {
    public function output() {}
        public function displayInUser() {
            $str = '<link rel="stylesheet" href="../public/css/User/review.css" />';
            $str .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
            $str .= '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />';
    
            $reviews = $this->model->getReviews();
    
            if (empty($reviews)) {
                // No reviews available
                $str .= '<div class="content">';
                $str .= '<div id="header"><h2>Customers Reviews</h2></div>';
                $str .= '</div>';
                $str .= '<div class="empty-reviews">No reviews available.</div>';
                
            } else {
                // Display reviews
                $str .= '<div class="content">';
                $str .= '<div id="header"><h2>Customers Reviews</h2></div>';
                $str .= '<div class="tablecont">';
                $str .= '<table>';
                $str .= '<thead class="tablehead">';
                $str .= '<tr>';
                $str .= '<th class="tableHeader">#ID</th>';
                $str .= '<th class="tableHeader">User Name</th>';
                $str .= '<th class="tableHeader">Product Title</th>';
                $str .= '<th class="tableHeader">Image</th>';
                $str .= '<th class="tableHeader">Review</th>';
                $str .= '</tr>';
                $str .= '</thead>';
                $str .= '<tbody>';
    
                foreach ($reviews as $Review) {
                    $str .= "<tr>";
                    $str .= "<td class='cell'>" . $Review->getId() . "</td> ";
                    $str .= "<td class='cell'>" . $Review->getUserName() . "</td> ";
                    $str .= "<td class='cell'>" . $Review->getProductTitle() . "</td> ";
                    $str .= "<td class='cell'><img src='../public/" . $Review->getImage() . "'></td>";
                    $str .= "<td class='cell'>" . $Review->getReview() . "</td> ";
                    $str .= "</tr>";
                }
    
                $str .= '</tbody>';
                $str .= '</table>';
                $str .= '</div>';
                $str .= '</div>';
            }
    
            return $str;
        }
    
   
    
  
public function nav()
{

  $profile = $_SESSION['name'];

      echo "
      <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
      <script src='../public/script/search.js'></script>
      <link rel='stylesheet' type='text/css' href='../public/css/User/nav.css'>
      <div class='wrapper1'>
    <div class='logo'><a href='index.php'><img src='../public/images/sweet dreams logo-01.png' alt='logo'></a></div>
    <li><a href='profile.php'>$profile</a></li>
    <li><a href='wishlist.php'>Wishlist</a></li>
    <li><a href='cart.php'>Cart</a></li>
        <a href='nav.php?action=logout'>Logout </a><br><br>
        <div>
        <input type='text' name='search_text' id='search_text' placeholder='Search...' />
        </div>
        </div>
        <div id='result'></div>
      </div>
    ";
  
  
}
public function nav1()
{
 echo"
 <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
 <script src='../public/script/search.js'></script>
  <link rel='stylesheet' type='text/css' href='../public/css/User/nav.css'>
  <div class='wrapper1'>
    <div class='logo'><a href='index.php'><img src='../public/images/sweet dreams logo-01.png' alt='logo'></a></div>
    <li><a href='login.php'>Login</a></li>
    <div>
    <input type='text' name='search_text' id='search_text' placeholder='Search...' />
    </div>
    </div>
    <div id='result'></div>
  </div>
    ";
   
  }
  public function side()
{
  $str='
  <link rel="stylesheet type="text/css" href="../public/css/User/nav.css">

  <input type="checkbox" id="active">
        <label for="active" class="menu-btn"><span></span></label>
        <label for="active" class="close"></label>
        <div class="wrapper">
            <ul>
                <li><a href="summer.php">Summer collection</a></li>
                <li><a href="winter.php">Winter collection</a></li>
                <li><a href="bundle.php">Bundle and save</a></li>
                <li><a href="blog.php">Blog</a></li>
                <!-- <li><a href="#">Gifts</a></li> -->
                <li><a href="review.php">Reviews</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="contact.php">Contact us</a></li>
            </ul>
        </div>
        ';
        return $str;
}
public function footer()
{
  echo footer();
}

}
