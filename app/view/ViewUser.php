<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/partials/sidebar.admin.php");
require_once(__ROOT__ . "view/partials/footer.php");

?>

<?php

class ViewUser extends View{	
  public function nav1()
{
  
 echo"
  <link rel='stylesheet' type='text/css' href='../public/css/User/nav.css'>
  <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='../public/script/search.js'></script>
  <div class='wrapper1'>
    <div class='logo'><a href='index.php'><img src='../public/images/sweet dreams logo-01.png' alt='logo'></a></div>
    <li><a href='login.php'>Login</a></li>
     <div>
    <input type='text' name='search_text' id='search_text' placeholder='Search...' />
    </div>
    </div>
    <div id='result'></div>";
   
  }
  
	public function output(){
		// $str.="<a href='profile.php?action=edit'>Edit Profile </a><br><br>";
		// $str.="<a href='profile.php?action=movie'>My Movies </a><br><br>";
		$str="<a href='login.php?action=login'>Login</a><br><br>";
		// $str.="<a href='profile.php?action=delete'>Delete Account </a>";
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
    <button><a href="myOrders.php">My Orders</a></button>
    <button><a href="nav.php?action=delete">Delete account</a></button>

  </form>
  ';
  return $str;
}
	function signupForm($errors = []) {

    $str = '
    <link rel="stylesheet" type="text/css" href="../public/css/User/reg.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../public/script/email.js"></script>
    <form action="reg.php?action=insert" method="post">
        <div class="input-box">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your name" >
            <span class="error">' . ($errors['nameErr'] ?? '') . '</span>
        </div>

        <div class="input-box">
            <label>Email Address</label>
            <input type="text" name="email" id="email" placeholder="username@email.com" required />
            <span class="error">' . ($errors['emailErr'] ?? '') . '</span>
            </br>
            <span class="error" id="result"></span>
        </div>

        <div class="input-box">
            <label>Phone number</label>
            <input type="text" name="phone" id="phone" placeholder="Enter your phone number" required />
            <span class="error">' . ($errors['phoneErr'] ?? '') . '</span>
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" method="post" placeholder="Enter your password" required />
            <span class="error">' . ($errors['passwordErr'] ?? '') . '</span>
        </div>

        <div class="input-box">
            <label>Confirm password</label>
            <input type="password" name="confirm" placeholder="Confirm your password" required />
            <span class="error">' . ($errors['confirmErr'] ?? '') . '</span>
        </div>

        <div class="column">
            <div class="input-box">
                <label>Birth Date</label>
                <input type="date" name="birth" placeholder="Enter birth date" required />
                <span class="error">' . ($errors['birthErr'] ?? '') . '</span>
            </div>
        </div>

        <div class="gender-box">
            <h3>Gender</h3>
            <div class="gender-option">
                <div class="gender">
                    <input type="radio" id="check-male" name="gender" value="male" />
                    <label for="check-male">Male</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-female" name="gender" value="female" />
                    <label for="check-female">Female</label>
                </div>
            </div>
            
        </div>

        <button type="submit" value="Submit">Submit</button>
    </form>
    ';

    return $str;
}

public function loginForm($errors = []) {
  $str = '<link rel="stylesheet" type="text/css" href="../public/css/User/login.css">
      <form action="login.php?action=login" method="post">
          <div class="input-box">
              <label>Email</label>
              <input type="text" name="email" placeholder="username@email.com" required />
              <span class="error">' . ($errors['emailErr'] ?? '') . '</span>
              <br>
              <span>If you do not have an account please <a href="reg.php">SignUp</a></span>
          </div>

          <div class="input-box">
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter your password" required />
              <span class="error">' . ($errors['passwordErr'] ?? '') . '</span>
          </div>

          <div>';

  // Check if there's a login error message
  if (isset($_POST['login'])) {
      // If form is submitted, capture email and password
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Call loginUser function with email and password
      $loginMessage = $this->model->loginUser($email, $password);

      // Display the login error message
      if ($loginMessage) {
          $str .= '<p class="error">' . $loginMessage . '</p>';
      }
  }

  $str .= '</div>
          <button type="submit" name="login" value="Submit">Login</button>
      </form>';

  return $str;
}


public function editForm($errors = []) {
  $name = $this->model->getName();
  $email = $this->model->getEmail();
  $str = '
    <link rel="stylesheet" type="text/css" href="../public/css/User/edit.css">
    <form action="edit.php?action=edit" method="post">
      <div class="input-box">
        <label><h6>Fullname<h6></label>
        <input type="text" value="' . $name . '" name="name"><br>
        <span class="error">' . ($errors['nameErr'] ?? '') . '</span>
        
      </div>
      <div class="input-box">
        <label><h6>Email<h6></label>
        <input type="text" value="' . $email . '" name="email"><br>
        <span class="error">' . ($errors['emailErr'] ?? '') . '</span>
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
      <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
      <script src='../public/script/search.js'></script>
      <link rel='stylesheet' type='text/css' href='../public/css/User/nav.css'>
      <div class='wrapper1'>
    <div class='logo'><a href='index.php'><img src='../public/images/sweet dreams logo-01.png' alt='logo'></a></div>
    <li><a href='profile.php'>$profile</a></li>
    <li><a href='#'>Wishlist</a></li>
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

public function home()
{
    $products = $this->model->ShowProducts(); // Fetch products using the ShowProducts() function
    
    // Display fetched products

    $str = '
    <link rel="stylesheet" type="text/css" href="../public/css/User/index.css">
    <header>
        <section class="hero-header">
            <h1>Shop and explore our new collection to get the chance to earn gifts</h1>
            <h2>Hurry up!!!</h2>
            <a href="summer.php"><button class="img_btn">Explore</button></a>
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
        <button><a href="bundle.php"><strong>Explore more</strong></a></button>
    </section>
    <br><br>
    <div class="h_products">
        <h2>New arrivals</h2>
    </div><br>
    <div class="Contain">';

    foreach ($products as $row) {
        $id = $row["id"];
        $title = $row["title"];
        $price = $row["price"];
        $prod_image = $row["prod_image"];

        $str .= '
        <div class="box" id="col' . $id . '">
            <form method="post" action="prod.php">
                <input type="hidden" name="product_id" value="' . $id . '">
                <button type="submit" name="add_to_description">
                    <img style="width:300px;height:250px;padding-top:20px;padding-left:20px;padding-right:20px;"
                         src="../public/' . $prod_image . '" alt="' . $title . '">
                    <p>' . $title . '</p>
                </button>
            </form>
        </div>';
    }

    $str .= '</div>';

    return $str;
}

public function contact()
{
  $str='        
  <link rel="stylesheet" type="text/css" href="../public/css/User/contact.css">

  <form method="post" action="send.php">
  <div class="send">
  <label for="name">Name: </label>
  <input type="text" name="name" id="name">

  <label for="message">Message: </label>
  <textarea name="message" id="message"></textarea>
<div class="send_btn">
  <button>send</button>
</div>
</div>
</form>';

return $str;
}

public function displayAllUsers()
{
    $users = $this->model->getAllUsers();
    
    echo sidebar();
    $str = ' 
    <div class="content">
                <div id="header"><h2>Users</h2></div>
                    <div class="tablecont">
                        <table>
                            <thead class="tablehead">
                                <tr>
                                    <th class="tableHeader">#ID</th>
                                    <th class="tableHeader">Full Name</th>
                                    <th class="tableHeader">Email</th>
                                    <th class="tableHeader">Date of Birthr</th>
                                    <th class="tableHeader">Gender</th>
                                    <th class="tableHeader">Operation</th>
                                </tr>
                            </thead>
                            <tbody>';

    foreach ($users as $user) {
        if (isset($user['id'])){
            $str .= '<tr>'; 
            $str .= '<td class="cell">' . $user['id'] . '</td>';
            $str .= '<td class="cell">' . $user['name'] . '</td>';
            $str .= '<td class="cell">' . $user['email'] . '</td>';
            $str .= '<td class="cell">' . $user['birth'] . '</td>';
            $str .= '<td class="cell">' . $user['gender'] . '</td>';
            $str.=' <td><button class="buttons" id="delete"> <a href="viewUsers.admin.php?action=delete&id=' . $user['id'] . '">Delete</a>
        </button></td>';
            $str .= '</tr>';
        }
    }

    $str .= '</tbody></table></div></div>';
    return $str;
}
public function showUserProducts()
{
  $user_id=$_SESSION['id'];

  $str = '<link rel="stylesheet" href="../public/css/User/summer.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />';

    // Assuming the user ID is stored in a session variable
    $user_id = $_SESSION['id'];
    $User_items=$this->model->showUserHistory($user_id);

    foreach ($User_items as $item) {
        $str .= '
        <div class="prod">
        <div class="product-card">
                <div class="product-tumb">
                    <input type="hidden" name="cart_id" value="' . $item['id'] . '">
                    <img src="../public/' . $item['prod_image'] . '">
                    </div>
                  <div class="product-details">
                    <h6>Title : ' . $item['title'] . '</h6>
                    
                    </div>
                    </div>
            
                    
                </div>';

}
return $str; 

}
public function footer()
{
  echo footer();
}

}

?>


