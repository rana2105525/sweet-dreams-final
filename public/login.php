<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "model/Admins.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "controller/AdminController.php");
require_once(__ROOT__ . "view/ViewUser.php");
require_once(__ROOT__ . "view/ViewAdmin.php");

$model = new Users();
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);

$modelA = new Admins();
$controllerA = new AdminController($modelA);
$viewA = new ViewUser($controllerA, $modelA);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

</head>
<body>
    <section class="container">
    <a href="index.php"><img src="images/sweet dreams logo-01.png" alt="logo"></a>
    <?php
     echo $view->loginForm($controller->getErrors());
     echo $view->adminlogin($controllerA->getErrors()); 
    ?>
    </section>
</body>
</html>
