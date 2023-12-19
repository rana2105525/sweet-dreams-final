<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Collection.php");
require_once(__ROOT__ . "controller/CollectionController.php");
require_once(__ROOT__ . "view/ViewCollections.php");
if (!isset($_SESSION["id"]) || $_SESSION["id"] === null) {
  header("Location: index.php");
  exit();
}
$model = new Collection();
$controller = new CollectionController($model);
$view = new ViewCollections($controller, $model);
$isLogged=isset($_SESSION["id"]);
if($isLogged)
{
    ?>
<?php
    echo $view->nav();
    echo $view->getDesc();
    echo $view->footer();
}
else
{
    ?>
<?php
    echo $view->nav1();
    echo $view->getDesc(); 
    echo $view->footer();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Product description </title>
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

	</head>
<body>
</body>
</html>
