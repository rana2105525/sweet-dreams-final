<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "controller/ReviewsController.php");
require_once(__ROOT__ . "view/partials/footer.php");

class ViewCollections extends View
{
    public function output()
    {

    }
    public function collectionsSummer()
    {
        $str = '<link rel="stylesheet" href="../public/css/User/summer.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />';

        $summerProducts = $this->model->collectionsSummer(); // Assuming this retrieves products

        foreach ($summerProducts as $summerCollection) {

            $str .= '
        <div class="prod">
            <div class="product-card">
                <div class="product-tumb">
                    <form method="post" action="prod.php">
                        <input type="hidden" name="product_id" value="' . $summerCollection['id'] . '">
                        <button type="submit" name="add_to_description">
                            <img src="../public/' . $summerCollection['prod_image'] . '">
                        </button>
                    </form>
                </div>
                <div class="product-details">
                    <span class="product-catagory">' . $summerCollection['category'] . '</span>
                    <h4>' . $summerCollection['title'] . '</h4>
                    <p>' . $summerCollection['description'] . '</p>
                    <div class="product-bottom-details">
                        <div class="product-price">' . $summerCollection['price'] . 'LE</div>
                    

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        }

        return $str;
    }

    public function collectionsWinter()
    {
        $str = '<link rel="stylesheet" href="../public/css/User/summer.css" />
               
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />';

        $WinterProducts = $this->model->collectionsWinter(); // Assuming this retrieves products

        foreach ($WinterProducts as $WinterCollection) {
            $str .= ' <div class="prod">
      <div class="product-card">

      
      <div class="product-tumb">
      <form method="post" action="prod.php">
                          <input type="hidden" name="product_id" value="' . $WinterCollection['id'] . '">
                          <button type="submit" name="add_to_description">
                          <img src="../public/' . $WinterCollection['prod_image'] . '">

                          </button>
                      </form>
                  </div>
                  <div class="product-details">
                      <span class="product-catagory">' . $WinterCollection['category'] . '</span>
                      <h4>' . $WinterCollection['title'] . '</h4>
                      <p>' . $WinterCollection['description'] . '</p>
                      <div class="product-bottom-details">
                          <div class="product-price">' . $WinterCollection['price'] . 'LE</div>
                          
                              </div>
                          </div>
                  
                          
                      </div>
                              </div>';
        }

        return $str;
    }
    public function collectionsBundleAndSave()
    {
        $str = '<link rel="stylesheet" href="../public/css/User/summer.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />';

        $BundleProducts = $this->model->collectionsBundleAndSave(); // Assuming this retrieves products

        foreach ($BundleProducts as $BundleCollection) {
            $str .= '<div class="prod">
      <div class="product-card">

      
      <div class="product-tumb">
      <form method="post" action="prod.php">
                          <input type="hidden" name="product_id" value="' . $BundleCollection['id'] . '">
                          <button type="submit" name="add_to_description">
                          <img src="../public/' . $BundleCollection['prod_image'] . '">

                          </button>
                      </form>
                  </div>
                  <div class="product-details">
                      <span class="product-catagory">' . $BundleCollection['category'] . '</span>
                      <h4>' . $BundleCollection['title'] . '</h4>
                      <p>' . $BundleCollection['description'] . '</p>
                      <div class="product-bottom-details">
                          <div class="product-price">' . $BundleCollection['price'] . 'LE</div>
                          
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
        echo "
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
        $str = '
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

    public function getDesc()
    {

        $prodDesc = $this->model->readDesc();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

            $this->model->addToCart($_SESSION['id'], $prodDesc['id'], $_POST['color'], $_POST['size'], $_POST['quantity']);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitadd'])) {

            $this->model->addToWishlist($_SESSION['id'], $prodDesc['id']);

        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitreview'])) {

            $this->model->addToreview($_SESSION['id'], $prodDesc['id'], $_POST['review']);

        }
        $str = '
        <link rel="stylesheet" href="../public/css/User/prod.css">
     <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
        <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
        <h1>' . $prodDesc['title'] . '</h1>
        <div class="container">
            <div class="single-product">
                <div class="row">
                    <div class="col-6">
                        <div class="product-image">
                            <div class="product-image-main">
                            <img src="../public/' . $prodDesc['prod_image'] . '">
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="breadcrumb">
                            <span><a href="index.php">Home</a></span>
                            <span class="active">' . $prodDesc['title'] . '</span>
                        </div>
    
                        <div class="product">
                            <div class="product-title">
                                <h2>' . $prodDesc['title'] . '</h2>
                            </div>
    
                            <div class="product-price">
                                <span class="offer-price">' . $prodDesc['price'] . '</span>
                            </div>
    
                            <div class="product-details">
                                <h3>Description</h3>
                                <p>' . $prodDesc['description'] . '</p>
                            </div>
                            <form method="post" >
                            <div class="product-size">
                            <h4>Size</h4>
                            <div class="size-layout">
                            <input type="radio" name="size" value="0-3" id="1" class="size-input">
                            <label for="1" class="size">0-3</label><br>
                            <input type="radio" name="size" value="3-6" id="2" class="size-input">
                            <label for="2" class="size">3-6</label><br>
                            <input type="radio" name="size" value="6-12" id="3" class="size-input">
                            <label for="3" class="size">6-12</label><br>
                            <input type="radio" name="size" value="12-24" id="4" class="size-input">
                            <label for="4" class="size">12-24</label><br>
                            <a href="../public/images/size-chart.jpg">Size chart</a>
                        
                            </div>
                        </div>
                        <div class="product-color">
                        <h4>Color</h4>
                
                        <input type="radio" id="orane" name="color" value="orange">
                        <label for="orange">Orange</label><br>

                        <input type="radio" id="blue" name="color" value="blue">
                        <label for="blue">Blue</label><br>
                        </div>
                    </div>
                    <h4>Quantity</h4>
                    <input type="number" name="quantity" value="1" min="1">
                    <span class="divider"></span>

                    <div class="product-btn-group">
                    
                    <div class="button heart no-style">
                        <i class="bx bxs-zap"></i>
                        <button type="submit" name="submit"> Buy now</button>
                        </div> </form>
                        <form method="post">
                        <div class="button heart no-style">
                           <i class="bx bxs-heart"></i> 
                           <button type="submit" name="submitadd">Add to wishlist</button>
                           <input type="hidden" name="prod_id" value="prod_id">
                        </div>
                       </form>
                    </div>
              
                
        
   
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rev">
<h2>Customer Reviews</h2>
<form action="prod.php?review" class="form" method="post">
    <div class="text-field">
        <label for="name">Write your review</label>
        <input type="text" id="review" name="review" placeholder="Write your review">
        <button type="submit" class="btn" name="submitreview">Submit</button>
    </div>
</form>
</div>';
        return $str;

    }
    public function getSearchDesc($id)
    {

        $prodDesc = $this->model->readSearchDesc($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

            $this->model->addToCart($_SESSION['id'], $prodDesc['id'], $_POST['color'], $_POST['size'], $_POST['quantity']);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitadd'])) {

            $this->model->addToWishlist($_SESSION['id'], $prodDesc['id']);

        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitreview'])) {

            $this->model->addToreview($_SESSION['id'], $prodDesc['id'], $_POST['review']);

        }

        $str = '
        <link rel="stylesheet" href="../public/css/User/prod.css">
     <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
        <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
        <h1>' . $prodDesc['title'] . '</h1>
        <div class="container">
            <div class="single-product">
                <div class="row">
                    <div class="col-6">
                        <div class="product-image">
                            <div class="product-image-main">
                            <img src="../public/images' . $prodDesc['prod_image'] . '">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="breadcrumb">
                            <span><a href="index.php">Home</a></span>
                            <span class="active">' . $prodDesc['title'] . '</span>
                        </div>
    
                        <div class="product">
                            <div class="product-title">
                                <h2>' . $prodDesc['title'] . '</h2>
                            </div>
    
                            <div class="product-price">
                                <span class="offer-price">' . $prodDesc['price'] . '</span>
                            </div>
    
                            <div class="product-details">
                                <h3>Description</h3>
                                <p>' . $prodDesc['description'] . '</p>
                            </div>
                            <form method="post" >
                            <div class="product-size">
                            <h4>Size</h4>
                            <div class="size-layout">
                            <input type="radio" name="size" value="0-3" id="1" class="size-input">
                            <label for="1" class="size">0-3</label><br>
                            <input type="radio" name="size" value="3-6" id="2" class="size-input">
                            <label for="2" class="size">3-6</label><br>
                            <input type="radio" name="size" value="6-12" id="3" class="size-input">
                            <label for="3" class="size">6-12</label><br>
                            <input type="radio" name="size" value="12-24" id="4" class="size-input">
                            <label for="4" class="size">12-24</label><br>
                            <a href="../public/images/size-chart.jpg">Size chart</a>
                        
                            </div>
                        </div>
                        <div class="product-color">
                        <h4>Color</h4>
                
                        <input type="radio" id="orane" name="color" value="orange">
                        <label for="orange">Orange</label><br>

                        <input type="radio" id="blue" name="color" value="blue">
                        <label for="blue">Blue</label><br>
                        </div>
                    </div>
                    <h4>Quantity</h4>
                    <input type="number" name="quantity" value="1" min="1">
                           

                    <div class="product-btn-group">
                          
                    <div class="button heart no-style">
                        <i class="bx bxs-zap"></i>
                        <button type="submit" name="submit_cart"> Buy now</button>
                        </div> 
                        </form>
                        <form method="post">
                        <div class="button heart no-style">
                           <i class="bx bxs-heart"></i> 
                           <button type="submit" name="submitadd">Add to wishlist</button>
                           <input type="hidden" name="prod_id" value="prod_id">
                        </div>
                       </form>
                    
   
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rev">
<h2>Customer Reviews</h2>
<form action="prod.php?review" class="form" method="post">
    <div class="text-field">
        <label for="name">Write your review</label>
        <input type="text" id="review" name="review" placeholder="Write your review">
        <button type="submit" class="btn" name="submitreview">Submit</button>
    </div>
</form>
</div>';
        return $str;

    }
    public function footer()
    {
      echo footer();
    }

}

