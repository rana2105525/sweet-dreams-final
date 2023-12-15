<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/wishlistModel.php");
require_once(__ROOT__ . "controller/wishlistController.php");
require_once(__ROOT__ . "view/wishlistView.php");

$model = new wishlistModel();
$controller = new wishlistController($model);
$view = new WishlistView($controller, $model);
$isLogged=isset($_SESSION["id"]);

if($isLogged)
{
    ?>
    <div class=title>
<?php
    echo $view->nav();
    echo "<h1>Wishlist</h1>";
    echo $view->side();
    echo $view->showWishlist();
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
    <title>Wishlist</title>
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />
	</head>
<body>
</body>


</body>
</html>