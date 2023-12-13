<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/OrderModel.php");
require_once(__ROOT__ . "controller/OrdersController.php");
require_once(__ROOT__ . "view/ViewOrders.php");



$model = new OrderModel();
$controller = new OrdersController($model);
$view = new ViewOrders($controller, $model);

echo $view->orders();

?>
<head><title>Orders</title></head>