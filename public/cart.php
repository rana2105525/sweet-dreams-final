<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/cartModel.php");
require_once(__ROOT__ . "controller/cartController.php");
require_once(__ROOT__ . "view/cartView.php");

if (!isset($_SESSION["id"]) || $_SESSION["id"] === null) {
  header("Location: index.php");
  exit();
}

$model = new cartModel();
$controller = new cartController($model);
$view = new cartView($controller, $model);
$isLogged = isset($_SESSION["id"]);

if ($isLogged) {
    ?>
    <div class=title>
        <?php
        echo $view->nav();
        echo "<h1 style='color:F27144;justify-content: center;
        text-align: center;margin-top:20px;'>cart</h1>";
        echo $view->side();
        echo $view->output();
        echo $view->check_btn();
        echo $view->footer();
        ?>
    </div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>cart </title>
        <link rel="icon" href="images/Sweet Dreams logo-01.png" type="image/icon type" />
    </head>
    <body>
        <?php include '../app/api/chatbot.php'; ?>
    </body>
    </html>
    <?php
} else {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
?>
