<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/UsersController.php");


class ViewUser extends View{	
	public function output(){
		// $str.="<a href='profile.php?action=edit'>Edit Profile </a><br><br>";
		// $str.="<a href='profile.php?action=movie'>My Movies </a><br><br>";
		$str="<a href='login.php?action=login'>Login</a><br><br>";
		// $str.="<a href='profile.php?action=delete'>Delete Account </a>";
		return $str;
	}
	function signupForm(){
		$str='
    <link rel="stylesheet" type="text/css" href="../public/css/User/reg.css">

          <form action="reg.php?action=insert" method="post"">
            <div class="input-box">
              <label>Full Name</label>
              <input type="text" name="name" placeholder="Enter your name" required>
            </div>
    
            <div class="input-box">
              <label>Email Address</label>
              <input type="text" name="email" id="email" placeholder="username@email.com" required />
            </div>
    
            <div class="input-box">
              <label>Phone number</label>
              <input type="text" name="phone" id="phone" placeholder="Enter your phone number" required />
    
            </div>
    
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" method="post" placeholder="Enter your password" required />
              </div>
              
    
            <div class="input-box">
                <label>Confirm password</label>
                <input type="password" name="confirm" placeholder="Confirm your password" required />
            </div>
    
            <div class="column">
              <div class="input-box">
                <label>Birth Date</label>
                <input type="date" name="birth" placeholder="Enter birth date" required />
              </div>
            </div>
            <div class="gender-box">
              <h3>Gender</h3>
              <div class="gender-option">
                <div class="gender">
                  <input type="radio" id="check-male" name="gender" value="male"/>
                  <label for="check-male">Male</label>
                </div>
                <div class="gender">
                  <input type="radio" id="check-female" name="gender" value="female" />
                  <label for="check-female">Female</label>
                </div>
               <span>already have an account?<a href="login.php"> Login</a></span>
            </div>
          
            <button type="submit"value="Submit">Submit</button>
          </form>
      
        ';
		return $str;
	}

  public function loginForm() {
    
    $str='
    <link rel="stylesheet" type="text/css" href="../public/css/User/login.css">

        <form action="login.php" method="post">
        <div class="input-box">
        <label>Email</label>
        <input type="text" name="email" placeholder="username@email.com" required />
         <span class="error" style="color:red"><?php echo $emailerr?></span> 
        <br>
        <span>If you do not have an account please <a href="reg.php">SignUp</a><span>
    </div>

    <div class="input-box">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required />
        <a href="#">Forget password?</a>
    </div>

            <button type="submit" name="login" value="Submit">Login</button>
        </form>';
        return $str;    


}
public function editForm() {
  $name = $this->model->getName();
  $email = $this->model->getEmail();
  $str = '
    <link rel="stylesheet" type="text/css" href="../public/css/User/edit.css">
    <form action="edit.php?action=edit" method="post">
      <div class="input-box">
        <label><h6>Fullname<h6></label>
        <input type="text" value="' . $name . '" name="name"><br>
        <span class="error"><?php echo $nameErr;?></span>
      </div>
      <div class="input-box">
        <label><h6>Email<h6></label>
        <input type="text" value="' . $email . '" name="email"><br>
        <span class="error"><?php echo $emailErr;?></span>
      </div>
      <button type="submit" name="edit" value="submit" class="button">save</button>
    </form>
  ';
  return $str;
}

public function nav()
{
    $profile= $this->model->getName();

      echo "
      <link rel='stylesheet' type='text/css' href='../public/css/User/nav.css'>
      <div class='wrapper1'>
    <div class='logo'><a href='index.php'><img src='../public/images/sweet dreams logo-01.png' alt='logo'></a></div>
    <li><a href='profile.php'>$profile</a></li>
    <li><a href='#'>Wishlist</a></li>
    <li><a href='#'>Cart</a></li>
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
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="../../contact.php">Contact us</a></li>
            </ul>
        </div>
        ';
        return $str;
}

public function home()
{
  $str='
  <link rel="stylesheet type="text/css" href="../public/css/User/index.css">
<header>
  <section class="hero-header">
      <h1>Shop and explore our new collection to get the chance to earn gifts</h1>
      <h2>Hurry up!!!</h2>
      <a href="#"><button class="img_btn">Explore</button></a>
    </section>
  </header>
  
  <br>
  <div class="h_products">
    <h2>Our products</h2>
  </div><br>
  <div class="Contain">
    <div class="box" id="col1">
      <a href="summer.php">
        <button type="button" class="b">
          <img
            src="../public/images/long-sleeved-t-shirt-children-s-clothing-top-cool-summer-boy-8c83e609f4319973d698e96068482e7a.png"
            alt="">
          <p>Summer collection</p>
        </button>
      </a>
    </div>
    <div class="box" id="col2">
      <a href="winter.php">
        <button type="button" class="b">
          <img
            src="../public/images/t-shirt-pajamas-carters-boy-clothing-little-monster-baby-home-pajamas-f14325570f638347c4aa1cccd0ca5e3f.png"
            alt="">
          <p>Winter collection</p>
        </button>
      </a>
    </div>
    <div class="box" id="col3">
      <a href="bundle.php">
        <button type="button" class="b">
          <img src="../public/images/pngegg.png" alt="">
          <p>Bundle and save</p>
        </button>
      </a>
    </div>
    <br>
  </div>
  <br>
  <br>
  <section id="banner" class="section-banner">

    <h2>Explore our <span>Bundle and save </span>products</h2>
    <button><a href="#"><strong>Explore more</strong></a></button>
  </section>
  <br><br>
  <div class="h_products">
    <h2>New arrivals</h2>
  </div><br>
  <div class="Contain">
      <div class="box" id="col1">
        <form method="post" action="prod_desc.php">
          <input type="hidden" name="product_id" value="">
          <button type="submit" name="add_to_description"><img style= "width:300px;height:250px;padding-top:20px;padding-left:20px;padding-right:20px;"src=""</button>                      
        </form>
      </div> 
  </div>
  ';
  return $str;
}

public function footer()
{
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
      <a href="#">View cart</a>
      <a href="#">My wishlist</a>
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
public function profile()
{
  $name = $this->model->getName();
  $email = $this->model->getEmail();

  $str='
  <link rel="stylesheet" type="text/css" href="../public/css/User/profile.css">

  <form class="form" method="post">
    <div class="input-box">
      <label>Fullname: </label>
    '.$name.'
    </div>
    <div class="input-box">
      <label>Email: </label>
      '.$email.'
    </div>
    <button><a href="edit.php" class="button">Update info</a></button>
		<button><a href="nav.php?action=delete">Delete account</a></button>

  </form>
  ';
  return $str;
}
}

?>


