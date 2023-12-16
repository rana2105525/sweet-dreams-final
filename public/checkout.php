<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/checkoutModel.php");
require_once(__ROOT__ . "controller/checkoutController.php");
require_once(__ROOT__ . "view/CheckoutView.php");


$model = new checkoutModel();
$controller = new checkoutController($model);
$view = new CheckoutView($controller, $model);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
  
	</head>
<body>

    <?php echo $view->output(); ?>
    <?php echo $view->footer();?>
    

</body>
</html>
