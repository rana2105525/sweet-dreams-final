<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
  <?php
      define('__ROOT__', "../app/");
      require_once(__ROOT__ . "model/Reviews.php");
      require_once(__ROOT__ . "controller/ReviewsController.php");
      require_once(__ROOT__ . "view/ViewUserReview.php");
      $model = new Reviews();
      $controller = new ReviewsController($model);
      $view = new ViewUserReview($controller, $model);
      
      
    
    
     echo $view->nav();
     echo $view->side();
       echo $view->displayInUser(); 
       echo $view->footer();
      ?>
  
  </div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>cart </title>
        <link rel="icon" href="images/Sweet Dreams logo-01.png" type="image/icon type" />
    </head>
    <body>
        <?php include '../app/api/chatbot.php'; ?>
    </body>
    </html>
    