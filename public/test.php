<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/cartModel.php");
require_once(__ROOT__ . "controller/cartController.php");



$model = new CartModel();
$controller = new CartController($model);

$controller->order_item();



?>
<head><title>Mine</title></head>