<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/cartModel.php");
require_once(__ROOT__ . "controller/cartController.php");
require_once(__ROOT__ . "view/cartView.php");

$model = new cartModel();
$controller = new cartController($model);
$view = new cartView($controller, $model);
$isLogged=isset($_SESSION["id"]);
if($isLogged)
{
    ?>
    <div class=title>
<?php
    echo $view->nav();
    echo "<h1>cart</h1>";
    echo $view->side();
    echo $view->showcart();
    echo $view->footer();
}
else
{
    ?>
    <div class=title>
<?php
    echo $view->nav1();
    echo "<h1>cart</h1>";
    echo $view->side();
    echo $view->showcart(); 
    echo $view->footer();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>cart </title>
	</head>
<body>

</div>

</body>
</html>