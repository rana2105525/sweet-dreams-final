<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Reviews</title>
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

	</head>
<body>
<div class=title><!DOCTYPE html>
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
      require_once(__ROOT__ . "view/ViewUserReview.php");
      $model = new Reviews();
      $controller = new ReviewsController($model);
      $view = new ViewUserReview($controller, $model);
      
      
    
    
     echo $view->nav();
     echo $view->side();
       echo $view->displayInUser(); 
       echo $view->footer();
      ?>
  
  </body>
  </html>