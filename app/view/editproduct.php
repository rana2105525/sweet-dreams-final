<?php
require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ ."db/config.php");
require_once(__ROOT__ ."db/Dbh.php");


class editproduct extends View{
  public function output(){

  }
  public function editProductForm(){
    $str = ''; // Initialize $str outside the loop
    $products = $this->model->showProducts();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
        // Retrieve values from $_POST
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        // Assuming the product ID is not submitted in the form
        // Instead, retrieve it from the product in the loop
        $productId = $products[0]["id"]; // Assuming the first product in the list

        // Call the editProduct method with the retrieved values and the specific product ID
        $this->model->editProduct($productId, $title, $price, $description);
    }

    foreach($products as $product){
        $str .= '<div class ="component">';
        echo sidebar();
        $str .= '<div class ="content rows">';
        $str .= '<section class="container">';
        $str .= '<form action="editProduct.admin.php" class="form" method="post" enctype="multipart/form-data">';
        $str .= '<div id="header"><h2>Edit product</h2></div>';
        $str .= '<input type="hidden" name="id" value="'. $product["id"].'" />';
        $str .= '<div class="input-box">';
        $str .= '<label for ="title">Product Title</label>';
        $str .= '<input type="text" id="title" name="title" value="'. $product["title"].'" >';
        $str .= '</div>';

        $str .= '<div class="input-box">';
        $str .= '<label for="price" >Product price</label>';
        $str .= '<input type="number" step="any" id ="price" name ="price" value="'. $product["price"].'" />';
        $str .= '</div>';

        $str .= '<div class="input-box">';
        $str .= '<label for ="description">Product description</label>';
        $str .= '<textarea id="description" name="description" rows="4" cols="85">'. $product["description"].'</textarea>';
        $str .= '</div>';

        $str .= '<button name="edit" type="submit">Update Product</button>';
        $str .= '</form>';
        $str .= '</section>';
        $str .= '</div>';
        $str .= '</div>';
        return $str;
    }

    // Move return statement outside the loop
    
}


}
