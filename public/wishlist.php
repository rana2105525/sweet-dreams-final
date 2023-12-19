<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/wishlistModel.php");
require_once(__ROOT__ . "controller/wishlistController.php");
require_once(__ROOT__ . "view/wishlistView.php");
if (!isset($_SESSION["id"]) || $_SESSION["id"] === null) {
  header("Location: index.php");
  exit();
}
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
    echo "<h1 style='color:F27144;justify-content: center;
        text-align: center;margin-top:20px;'>Wishlist</h1>";
    echo $view->side();
    echo $view->showWishlist();
    echo $view->footer();
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
  <?php include '../app/api/chatbot.php'; ?>
</body>
</html>