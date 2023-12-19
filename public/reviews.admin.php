<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Reviews</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/admin/reviews.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 
 
  <body>
  <?php
      define('__ROOT__', "../app/");
      require_once(__ROOT__ . "model/Reviews.php");
      require_once(__ROOT__ . "controller/ReviewsController.php");
      require_once(__ROOT__ . "view/ViewReview.php");
      require_once(__ROOT__ . "model/admin.php");
      require_once(__ROOT__ . "model/Admins.php");
      require_once(__ROOT__ . "controller/AdminController.php");
      require_once(__ROOT__ . "view/ViewAdmin.php");
      
      if (!isAdmin()) {
        // Redirect the user to the login page if not logged in as an admin
        header("Location: index.php");
        exit();
      }
      if (!isset($_SESSION["ID"]) || $_SESSION["ID"] === null) {
        header("Location: login.php");
        exit();
      }
      $model = new Reviews();
      $controller = new ReviewsController($model);
      $view = new ViewReview($controller, $model);
      
      if (isset($_GET['action']) && !empty($_GET['action'])) {
        if($_GET['action']=='delete'){
              $controller->delete($_GET['id']);
			        echo $view->displayInAdmin();
        }
      }
      else echo $view->displayInAdmin();
  ?>
  </body>
</html>