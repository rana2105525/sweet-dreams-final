<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/admin/allProducts.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head>  

  <body>
    <?php
    
      define('__ROOT__', "../app/");
      require_once(__ROOT__ . "model/products.php");
      require_once(__ROOT__ . "controller/ProductsController.php");
      require_once(__ROOT__ . "view/ViewProducts.php");
      require_once(__ROOT__ . "model/admin.php");
require_once(__ROOT__ . "model/Admins.php");
require_once(__ROOT__ . "controller/AdminController.php");
require_once(__ROOT__ . "view/ViewAdmin.php");
      $model = new Products();
      $controller = new ProductsController($model);
      $view = new ViewProducts($controller, $model);
      if (!isAdmin()) {
        // Redirect the user to the login page if not logged in as an admin
        header("Location: login.php");
        exit();
      }
      if (isset($_GET['action']) && !empty($_GET['action'])) {
        switch($_GET['action']){
            case 'insert':
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $controller->insert();
              }
              header('Location: products.admin.php');
              break;
            case 'delete':
              $controller->delete($_GET['id']);
              header('Location: products.admin.php');
              break;
            case'edit':
             $controller->edit($_GET['id']);
              break;
        }
    } 
    else
        echo $view->output(); 
    ?>
  </body>
</html>