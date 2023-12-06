<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Collection.php");
require_once(__ROOT__ . "controller/CollectionController.php");
require_once(__ROOT__ . "view/ViewCollections.php");

$model = new Collection();
$controller = new CollectionController($model);
$view = new ViewCollections($controller, $model);
$isLogged=isset($_SESSION["id"]);
if($isLogged)
{
    ?>
<?php
    echo $view->nav();
    echo $view->side();
    echo $view->getDesc();
    echo $view->footer();
}
else
{
    ?>
<?php
    echo $view->nav1();
    echo $view->side();
    echo $view->getDesc(); 
    echo $view->footer();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Product description </title>
	</head>
<body>
</body>
</html>
