<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    echo $view->check_btn();
    echo $view->footer();
}
else
{
echo "sorry you can't access this page please login";
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