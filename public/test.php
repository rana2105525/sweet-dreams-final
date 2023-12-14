<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/products_orderdModel.php");
require_once(__ROOT__ . "controller/products_orderdController.php");
require_once(__ROOT__ . "view/ViewOrderedProducts.php");



$model = new Product_orderedModel();
$controller = new products_orderdController($model);
$view = new ViewOrderedProducts($controller, $model);


echo $view->insertOrderedItems();


?>
<head><title>Orders</title></head>