<?php
require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");


class editproduct extends View{
  public function output(){

  }

public function editProductForm(){
    $str = ''; // Initialize $str outside the loop

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
        // Retrieve values from $_POST
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Assuming you have a way to get the ID of the product to be edited, e.g., $_POST['product_id']
        

        // Call the editProduct method with the retrieved values and the specific product ID
        $this->model->editProduct( $title, $price, $description);
    }
    $products=$this->model->showProducts();

    foreach($products as $Product){
        $str .= '<div class ="component">';
        echo sidebar();
        $str .= '<div class ="content rows">';
        $str .= '<section class="container">';
        $str .= '<form action="editProduct.admin.php" class="form" method="post" enctype="multipart/form-data">';
        $str .= '<div id="header"><h2>Edit product</h2></div>';
        $str .= '<input type="hidden" name="id" value="'. $Product["id"].'" />';
        $str .= '<div class="input-box">';
        $str .= '<label for ="title">Product Title</label>';
        $str .= '<input type="text" id="title" name="title" value="'. $Product["title"].'" >';
        $str .= '</div>';

        $str .= '<div class="input-box">';
        $str .= '<label for="price" >Product price</label>';
        $str .= '<input type="number" step="any" id ="price" name ="price" value="'. $Product["price"].'" />';
        $str .= '</div>';

        $str .= '<div class="input-box">';
        $str .= '<label for ="description">Product description</label>';
        $str .= '<textarea id="description" name="description" rows="4" cols="85">'. $Product["description"].'</textarea>';
        $str .= '</div>';

        // Add a hidden input field to store the product ID
        

        $str .= '<button name="edit" type="submit">Update Product</button>';
        $str .= '</form>';
     
 return $str;
    }  
   
    // Move return statement outside the loop
   
}
}
