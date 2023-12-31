<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");


$model = new Users();
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
    <title>Registration form</title>
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

	</head>
<body>
	
<section class="container">
        <a href="index.php"><img src="images/Sweet Dreams logo-01.png" alt="logo" ></a>
    <?php echo $view->signupForm($controller->getErrors()); ?>
	</section>
</body>
</html>