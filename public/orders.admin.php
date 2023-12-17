<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Orders.php");
require_once(__ROOT__ . "controller/OrdersController.php");
require_once(__ROOT__ . "view/ViewOrders.php");



$model = new Orders();
$controller = new OrdersController($model);
$view = new ViewOrders($controller, $model);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/Admin/orders.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

  </head> 

  <body>
  <div class="component">
    <?php
    echo $view->output();
    ?>
  </div>
  </body>
</html>