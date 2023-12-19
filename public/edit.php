<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

if (!isset($_SESSION["id"]) || $_SESSION["id"] === null) {
  header("Location: index.php");
  exit();
}
$model = new User($_SESSION["id"]);
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Edit profile</title>
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

	</head>
<body>
    <h1>Edit profile<h1>
    <section class="container">
    <?php echo $view->editForm($controller->getErrors()); ?>
    </section>
    <?php echo $view->footer();?>
    <?php include '../app/api/chatbot.php'; ?>

</body>
</html>