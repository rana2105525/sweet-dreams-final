<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "view/partials/sidebar.admin.php");


class ViewBlog extends View{
    public function output(){
      $str='<div class ="component">';
      echo sidebar();
      $str.='<div class ="content rows">';
      $str.='<section class="container">';
      $str.='<form action="blog.admin.php?action=insert" class="form" method="post" enctype= "multipart/form-data">';
      $str.='<div id="header"><h2>Add Blog</h2></div>';
      
      $str.='<div class="input-box">';
      $str.='<label for="btext">Blog Text</label>';
      $str.='<textarea id="bext" name="btext" rows="4" cols="85"></textarea>';
      $str.='</div>'; 

      $str.='<div class="input-box">';
      $str.='<label for="blog_image">Blog image</label>';
      $str.='<input type="file" id="blog_image" name="blog_image" accept =".png,.jpg,.jpeg"/>';
      $str.='</div>';
  
      $str.='<button type="submit" name="submit" id="submit-button" value="submit">Add Blog</button>';
      $str.='</form>';
      $str.='</section>';
      $str.='</div>';
      $str.='</div>';
      return $str;
    } 

    public function blog()
    {
        $str = '
        <link rel="stylesheet type="text/css" href="../public/css/User/reviews.css">
        <div class="container">';
    
        $allBlogs = $this->model->blog();
    
        foreach ($allBlogs as $blog) {
            $imageURL = filter_var($blog["blog_img"], FILTER_SANITIZE_URL);
            $escapedText = htmlspecialchars($blog["blog_text"]);
    
            if ($imageURL) {
                $str .= '<img src="' . $imageURL . '">';
            } else {
                $str .= '<img src="placeholder-image.png">';
            }
    
            $str .= '<p>' . $escapedText . '</p>';
        }
    
        $str .= '</div>';
        return $str;
    }

    public function footer()
{
  $str='
  <link rel="stylesheet type="text/css" href="../public/css/User/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

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
      <a href="about.php">About us</a>
      <a href="index.php">Home</a>
      <a href="privacy.php">Privacy policy</a>
      <a href="t&cond.php">Terms & conditions</a>

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
    
}
