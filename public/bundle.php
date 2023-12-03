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
    <title>Bundle and save collection</title>
	</head>
<body>
<div class=title>
    <?php
echo "<h1>Bundle and save</h1>";
?>
</div>

<?php echo $view->collectionsBundleAndSave(); ?>
<?php echo $view->footer()?>

</body>
</html>