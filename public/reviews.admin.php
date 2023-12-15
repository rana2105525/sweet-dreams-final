<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/admin/reviews.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head> 
 
  <body>
  <?php
      define('__ROOT__', "../app/");
      require_once(__ROOT__ . "model/Review.php");
      require_once(__ROOT__ . "controller/ReviewsController.php");
      require_once(__ROOT__ . "view/ViewReview.php");
      $model = new Review();
      $controller = new ReviewsController($model);
      $view = new ViewReview($controller, $model);

      echo $view->displayReviews();

  ?>
  </body>
</html>