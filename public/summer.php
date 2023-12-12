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
    <div class=title>
<?php
    echo $view->nav();
    echo "<h1>Summer collection</h1>";
    echo $view->side();
    echo $view->collectionsSummer();
    echo $view->footer();
}
else
{
    ?>
    <div class=title>
<?php
    echo $view->nav1();
    echo "<h1>Summer collection</h1>";
    echo $view->side();
    echo $view->collectionsSummer(); 
    echo $view->footer();
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Summer collection</title>
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

	</head>
<body>

</div>

</body>
</html>