<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/UsersController.php");

class ViewCollections extends View{
  public function output(){

  }
  public function collectionsSummer() {
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
                            <img src="../public/images/' . $summerCollection['prod_image'] . '">
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

public function collectionsWinter() {
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
                          <img src="../public/images' . $WinterCollection['prod_image'] . '">

                          </button>
                      </form>
                  </div>
                  <div class="product-details">
                      <span class="product-catagory">' . $WinterCollection['category'] . '</span>
                      <h4>' . $WinterCollection['title'] . '</h4>
                      <p>' . $WinterCollection['description'] . '</p>
                      <div class="product-bottom-details">
                          <div class="product-price">' . $WinterCollection['price'] . 'LE</div>
                          <div class="product-links">
                              <a href=""><i class="fa fa-heart"></i></a>
                              <a href=""><i class="fa fa-shopping-cart"></i></a>
                              </div>
                              </div>
                          </div>
                  
                          
                      </div>
                              </div>';
  }

  return $str;
}
public function collectionsBundleAndSave() {
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
                          <img src="../public/images' . $BundleCollection['prod_image'] . '">

                          </button>
                      </form>
                  </div>
                  <div class="product-details">
                      <span class="product-catagory">' . $BundleCollection['category'] . '</span>
                      <h4>' . $BundleCollection['title'] . '</h4>
                      <p>' . $BundleCollection['description'] . '</p>
                      <div class="product-bottom-details">
                          <div class="product-price">' . $BundleCollection['price'] . 'LE</div>
                          <div class="product-links">
                              <a href=""><i class="fa fa-heart"></i></a>
                              <a href=""><i class="fa fa-shopping-cart"></i></a>
                              </div>
                              </div>
                          </div>
                  
                          
                      </div>
                              </div>';
  }

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
      <link rel='stylesheet' type='text/css' href='../public/css/User/nav.css'>
      <div class='wrapper1'>
    <div class='logo'><a href='index.php'><img src='../public/images/sweet dreams logo-01.png' alt='logo'></a></div>
    <li><a href='profile.php'>$profile</a></li>
    <li><a href='#'>Wishlist</a></li>
    <li><a href='cart.php'>Cart</a></li>
		<a href='nav.php?action=logout'>Logout </a><br><br>
    <div class='wrap'>
    <div class='search'>
    <input type='text' class='searchTerm' placeholder='What are you looking for?'>
     <button type='submit' class='searchButton'>
   <i class='fa fa-search'></i>
     </button>
   </div>
  </div>
    </ul>
  </div>
    ";
  
  
}
public function nav1()
{
 echo"
  <link rel='stylesheet' type='text/css' href='../public/css/User/nav.css'>
  <div class='wrapper1'>
    <div class='logo'><a href='index.php'><img src='../public/images/sweet dreams logo-01.png' alt='logo'></a></div>
    <li><a href='login.php'>Login</a></li>
    <div class='wrap'>
    <div class='search'>
    <input type='text' class='searchTerm' placeholder='What are you looking for?'>
     <button type='submit' class='searchButton'>
   <i class='fa fa-search'></i>
     </button>
   </div>
  </div>
    </ul>
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

public function getDesc()
{

  $prodDesc=$this->model->readDesc();
        $str='
        <link rel="stylesheet" href="../public/css/User/prod.css">
     <link rel="icon" href="imgs/sweet dreams logo-01.png" type="image/icon type" />
        <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
        <h1>'. $prodDesc['title'] . '</h1>
        <div class="container">
            <div class="single-product">
                <div class="row">
                    <div class="col-6">
                        <div class="product-image">
                            <div class="product-image-main">
                                <img src="../../public/'. $prodDesc['prod_image'] . ' alt="" id="product-main-image">
                            </div>
                            <div class="product-image-slider">
                                <img src="../../public/images/1.jpg" alt="" class="image-list">
                                <img src="../../public/images/2.jpg" alt="" class="image-list">
                                <img src="../../public/images/3.jpg" alt="" class="image-list">
                                <img src="../../public/images/4.jpg" alt="" class="image-list">
                                <img src="../../public/images/5.jpg" alt="" class="image-list">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="breadcrumb">
                            <span><a href="index.php">Home</a></span>
                            <span class="active">'. $prodDesc['title'] . '</span>
                        </div>
    
                        <div class="product">
                            <div class="product-title">
                                <h2>'. $prodDesc['title'] .'</h2>
                            </div>
    
                            <div class="product-price">
                                <span class="offer-price">'. $prodDesc['price'] .'</span>
                            </div>
    
                            <div class="product-details">
                                <h3>Description</h3>
                                <p>'.$prodDesc['description'] .'</p>
                            </div>
                            <div class="product-size">
                                <h4>Size</h4>
                                <div class="size-layout">
                                    <input type="radio" name="size" value="S" id="1" class="size-input">
                                    <label for="1" class="size">0-3</label>
    
                                    <input type="radio" name="size" value="M" id="2" class="size-input">
                                    <label for="2" class="size">3-6</label>
    
                                    <input type="radio" name="size" value="L" id="3" class="size-input">
                                    <label for="3" class="size">6-12</label>
    
                                    <input type="radio" name="size" value="XL" id="4" class="size-input">
                            <label for="4" class="size">12-24</label>
                            
                            <a href="../public/images/size-chart.jpg">Size chart</a>
                        
                        </div>
                    </div>
                    <div class="product-color">
                        <h4>Color</h4>
                        <div class="color-layout">
                            <input type="radio" name="color"  value="black" class="color-input">
                            <label for="black" class="black"></label>
                            <input type="radio" name="color"  value="red" class="color-input">
                            <label for="red" class="red"></label>

                            <input type="radio" name="color"  value="blue" class="color-input">
                            <label for="blue" class="blue"></label>
                        </div>
                    </div>
                    <span class="divider"></span>

                    <div class="product-btn-group">
                    <form method="post" action="cart.php">
                    <div class="button heart no-style">
                        <i class="bx bxs-zap"></i>
                        <button type="submit" value="'.$this->model->addToCart($_SESSION['id'],$prodDesc['id'],1).'"> Buy now</button>
                        </div> </form>
                
                    </div>
                </form>
        <div class="button heart">
            <i class="bx bxs-heart"></i> 
            Add to Wishlist
        </div>
   
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rev">
<h2>Customer Reviews</h2>
<form action="" class="form" method="post">
    <div class="text-field">
        <label for="name">Write your review</label>
        <input type="text" id="fullname" name="fullname" placeholder="Write your name">
        <input type="text" id="review" name="review" placeholder="Write your review">
        <button type="submit" class="btn" name="submit">Submit</button>
    </div>
</form>
</div>';
return $str;

}

    }

