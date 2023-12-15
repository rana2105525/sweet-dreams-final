<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/wishlistModel.php");
require_once(__ROOT__ . "controller/wishlistController.php");
require_once(__ROOT__ . "view/wishlistView.php");

$model = new wishlistModel();
$controller = new wishlistController($model);
$view = new WishlistView($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action'])
    {
        case 'delete':
            $controller->deleteWishlistItem();
            echo "item deleted successfully";
            break;
        case'deleteALL':
            $controller->deleteALL();
            echo"Your wishlist is empty";
            break;
	}
}


?>