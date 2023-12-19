<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/cartController.php");


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

    

    
    public function footer(){
        $str='
      <link rel="stylesheet type="text/css" href="../public/css/User/footer.css">
    
      <footer class="pageFooter">
        <div class="col">
          <a href="index.php"><img class="Logo" src="../public/images/Sweet Dreams logo-01.png" alt="" width="145" height="100"></a>
          <h4>Contact</h4>
          <p><strong>Adress: </strong>Misr International University</p>
          <p><strong>Phone: </strong>010000000</p>
          <p><strong>Hours: </strong>9 am - 12 am . Mon-Sat</p>
          <div class="follow">
            <h4>Follow us</h4>
            <div class="icon">
              <a href="https://www.facebook.com/"> <i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
              <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
              <a href="https://www.pinterest.com/"><i class="fab fa-pinterest"></i></a>
              <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>
        <div class="col">
          <h4>About</h4>
          <a href="#">About us</a>
          <a href="index.php">Home</a>
          <a href="#">Privacy policy</a>
          <a href="#">Terms & conditions</a>
    
        </div>
    
        <div class="col">
          <h4>My Account</h4>
          <a href="login.php">Sign in</a>
          <a href="blog.php">Blog</a>
          <a href="review.php">Reviews</a>
        </div>
    
        <div class="col install">
          <h4>Install app</h4>
          <p>From App-Store or Google play</p>
          <div class="row">
            <img src="../public/images/appStore.png" width="130" height="40">
            <img src="../public/images/googlePlay (2).png" width="130" height="40">
          </div>
          <p>Secured payment geteways</p>
          <img src="../public/images/Payment.png" width="300" height="50">
    
        </div>
    
      </footer>
      <div class="copyright">
        <p>© 2023, Sweet dreams - E-Commerce</p>
      </div>
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
 
    
}
