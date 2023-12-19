<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/cartController.php");
require_once(__ROOT__ . "view/partials/footer.php");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class WishlistView extends View {

  public  function output(){

  }
  
  public function showWishlist() {
    $user_id = $_SESSION['id'];
    $WishlistProducts = $this->model->showInWishlist($user_id);

    
   

    $str = '<link rel="stylesheet" href="../public/css/User/cart.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
            <button><a href="wish_options.php?action=deleteALL&id=' . $user_id . '">delete all</a></button>';
 if (empty($WishlistProducts)) {
      $str .= '<div class="empty-cart">Wishlist is empty.</div>';
      return $str;
  }
    foreach ($WishlistProducts as $WishProduct) {
        $str .= '
        <div class="prod">
            <div class="product-card">
                <div class="product-tumb">
                    <input type="hidden" name="cart_id" value="' . $WishProduct['id'] . '">
                    <img src="../public/' . $WishProduct['image'] . '">
                </div>
                <div class="product-details">
                    <h4>Title : ' . $WishProduct['name'] . '</h4>
                    <div class="product-bottom-details">
                        <div class="product-price">Price : ' . $WishProduct['price'] . 'LE</div>

                        <!-- Delete form -->
                        <form method="post" action="wishlist.php">
                            <input type="hidden" name="wish_id" value="' . $WishProduct['id'] . '">
                            <button><a href="wish_options.php?action=delete&id=' . $WishProduct['id'] . '">Delete item</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
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
      </div>";
       
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
