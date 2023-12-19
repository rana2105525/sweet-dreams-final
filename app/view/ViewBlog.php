<?php

require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "view/partials/sidebar.admin.php");
require_once(__ROOT__ . "view/partials/footer.php");


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
    
            $str .= '<p style="font-size: 20px;">' . $escapedText . '</p>';
        }
    
        $str .= '</div>';
        return $str;
    }

    public function footer()
    {
      echo footer();
    }
}
