<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Collection.php");
require_once(__ROOT__ . "controller/CollectionController.php");
require_once(__ROOT__ . "view/ViewCollections.php");

$model = new Collection();
$controller = new CollectionController($model);
$view = new ViewCollections($controller, $model);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Winter</title>
	</head>
<body>
<div class=title>
    <?php
echo "<h1>Winter</h1>";
?>
</div>

<?php echo $view->collectionsWinter(); ?>
</body>
</html>