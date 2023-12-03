<?php

require_once(__ROOT__ . "view/View.php");

class ViewCollections extends View{
  public function output(){

  }
  public function collectionsSummer() {
    $str = '<link rel="stylesheet" href="../public/css/User/summer.css" />
            <div class="prod">';

    $summerProducts = $this->model->collectionsSummer(); // Assuming this retrieves products

    foreach ($summerProducts as $summerCollection) {
        $str .= '<div class="product-card">
                    <div class="product-tumb">
                        <form method="post" action="prod.php">
                            <input type="hidden" name="product_id" value="' . $summerCollection['id'] . '">
                            <button type="submit" name="add_to_description">
                            <img src="../public/images' . $summerCollection['prod_image'] . '">

                            </button>
                        </form>
                    </div>
                    <div class="product-details">
                        <span class="product-catagory">' . $summerCollection['category'] . '</span>
                        <h4>' . $summerCollection['title'] . '</h4>
                        <p>' . $summerCollection['description'] . '</p>
                        <div class="product-bottom-details">
                            <div class="product-price">' . $summerCollection['price'] . 'LE</div>
                            <div class="product-links">
                                <a href=""><i class="fa fa-heart"></i></a>
                                <a href=""><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
    }

    $str .= '</div>';

    return $str;
}
public function collectionsWinter() {
  $str = '<link rel="stylesheet" href="../public/css/User/summer.css" />
          <div class="prod">';

  $WinterProducts = $this->model->collectionsWinter(); // Assuming this retrieves products

  foreach ($WinterProducts as $WinterCollection) {
      $str .= '<div class="product-card">
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
              </div>';
  }

  $str .= '</div>';

  return $str;
}
public function collectionsBundleAndSave() {
  $str = '<link rel="stylesheet" href="../public/css/User/summer.css" />
          <div class="prod">';

  $BundleProducts = $this->model->collectionsBundleAndSave(); // Assuming this retrieves products

  foreach ($BundleProducts as $BundleCollection) {
      $str .= '<div class="product-card">
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
              </div>';
  }

  $str .= '</div>';

  return $str;
}

}