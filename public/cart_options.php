<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/cartModel.php");
require_once(__ROOT__ . "controller/cartController.php");
require_once(__ROOT__ . "view/cartView.php");

$model = new CartModel();
$controller = new CartController($model);
$view = new cartView($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action'])
    {
	
        case 'delete':
            $controller->deleteCartItem();
            echo "item deleted successfully";
            break;
       
	}
}


?>