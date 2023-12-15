<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/checkoutModel.php");
require_once(__ROOT__ . "controller/checkoutController.php");
require_once(__ROOT__ . "view/CheckoutView.php");


$model = new checkoutModel();
$controller = new checkoutController($model);
$view = new CheckoutView($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action'])
    {
        case'checkout':
            $controller->deleteALL();
            echo"Your wishlist is empty";
            break;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
  
	</head>
<body>
  
    <section class="container">
    <?php echo $view->output(); ?>
    </section>
    

</body>
</html>
