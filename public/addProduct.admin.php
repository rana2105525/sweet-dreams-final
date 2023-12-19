<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/admin/editProduct.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head>  

  <body> 
    <?php
      define('__ROOT__', "../app/");
      require_once(__ROOT__ . "model/products.php");
      require_once(__ROOT__ . "controller/ProductsController.php");
      require_once(__ROOT__ . "view/ViewProducts.php");
      $model = new Products();
      $controller = new ProductsController($model);
      $view = new ViewProducts($controller, $model);
      echo $view->addProductForm();
      ?>
  </body>
</html>