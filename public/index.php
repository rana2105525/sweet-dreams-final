<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new User($_SESSION["id"]);
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);


// echo $view->output();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Home | sweet dreams</title>
	</head>
<body>
   <?php echo $view->nav();?>
   <?php echo $view->side();?>
   <?php echo $view->home();?>
   <?php echo $view->footer();?>
</body>
</html>