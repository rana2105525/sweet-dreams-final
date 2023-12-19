<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/checkoutModel.php");
require_once(__ROOT__ . "controller/checkoutController.php");
require_once(__ROOT__ . "view/CheckoutView.php");

if (!isset($_SESSION["id"]) || $_SESSION["id"] === null) {
  header("Location: index.php");
  exit();
}
$model = new checkoutModel();
$controller = new checkoutController($model);
$view = new CheckoutView($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
  
	</head>
<body>

    <?php echo $view->output($controller->getErrors()); ?>
    <?php echo $view->footer();?>
    
    <?php include '../app/api/chatbot.php'; ?>

</body>
</html>
