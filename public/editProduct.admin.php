<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/admin/form.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head>  

  <body>
    <?php 
    define('__ROOT__', "../app/");
          require_once(__ROOT__ . "model/admin.php");
          require_once(__ROOT__ . "model/Admins.php");
          require_once(__ROOT__ . "controller/AdminController.php");
          require_once(__ROOT__ . "view/ViewAdmin.php");
          
          
        
          
    require_once(__ROOT__ . "model/editproduct.php");
      require_once(__ROOT__ . "controller/editproductController.php");
      require_once(__ROOT__ . "view/editproduct.php");
      if (!isset($_SESSION["ID"]) || $_SESSION["ID"] === null) {
        header("Location: index.php");
        exit();
      }

      $model = new editproducts();
      $controller = new editproductController($model);
      $view = new editproduct($controller, $model);

      if (isset($_GET['action']) && !empty($_GET['action'])) {
        $controller->{$_GET['action']}();
      }

$model = new editproducts();
$controller = new editproductController($model);
$view = new editproduct($controller, $model);
    echo $view->editProductForm();
      ?>
  </body>
</html>