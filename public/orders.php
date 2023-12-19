<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/products_orderdModel.php");
require_once(__ROOT__ . "controller/CollectionController.php");
require_once(__ROOT__ . "view/ViewOrderedProducts.php");

$model = new Product_orderedModel();
$controller = new CollectionController($model);
$view = new ViewOrderedProducts($controller, $model);
$isLogged=isset($_SESSION["id"]);
if($isLogged)
{
    ?>
<?php

    echo $view->showUserProducts();

}
else
{
    ?>
<?php

echo $view->showUserProducts();
  
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Products Ordered </title>
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

	</head>
<body>
</body>
</html>
