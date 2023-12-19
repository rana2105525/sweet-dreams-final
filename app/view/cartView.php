<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/cartController.php");
require_once(__ROOT__ . "view/partials/footer.php");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class CartView extends View {

  public  function output(){

  }
  
  public function showCart() {
    $str = '<link rel="stylesheet" href="../public/css/User/cart.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />';

    // Assuming the user ID is stored in a session variable
    $user_id = $_SESSION['id'];

    $cartProducts = $this->model->showInCart($user_id);

    // Check if the cart is empty
    if (empty($cartProducts)) {
      $str .= '<div class="empty-cart">Cart is empty.</div>';
      return $str;
  }
    $totalPrice = 0; // Initialize total price

    foreach ($cartProducts as $cartProduct) {
        $str .= '
        <div class="prod">
            <div class="product-card">
                <div class="product-tumb">
                    <input type="hidden" name="cart_id" value="' . $cartProduct['id'] . '">
                    <img src="../public/' . $cartProduct['image'] . '">
                </div>
                <div class="product-details">
                    <h4>Title : ' . $cartProduct['name'] . '</h4>
                    <h4>Quantity : ' . $cartProduct['quantity'] . '</h4>
                    <div class="product-bottom-details">
                        <div class="product-price">Price : ' .( $cartProduct['price'] * $cartProduct['quantity'] ). 'LE</div>

                        <!-- Delete form -->
                        <form method="post" action="cart.php">
                            <input type="hidden" name="cart_id" value="' . $cartProduct['id'] . '">
                            <button><a href="cart_options.php?action=delete&id=' . $cartProduct['id'] . '">Delete item</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>';

        // Update total price for each item
        $totalPrice += ($cartProduct['price'] * $cartProduct['quantity']);
    }
    $_SESSION['total_price'] = $totalPrice;

    // Display total price
    $str .= '<div>Total Price: ' . $totalPrice . 'LE</div>';


    return $str;
}


public function check_btn()
{
    // Check if the cart is empty
    $user_id = $_SESSION['id'];
    $cartProducts = $this->model->showInCart($user_id);

    if (empty($cartProducts)) {
        // Cart is empty, so return an empty string
        return '';
    }

    // Cart is not empty, display the checkout button
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitdelete'])) {
        $this->model->deleteALL();
    }

    $str = '
    <form method="POST" action="checkout.php">
        <div class="button heart no-style">
            <i class="bx bxs-zap"></i>
            <button type="submit" name="submitdelete">Proceed to checkout</button>
        </div>
    </form>
    ';

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
