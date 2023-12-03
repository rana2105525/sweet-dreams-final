<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new User($_SESSION["id"]);
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action'])
    {
		case 'logout':
			session_destroy();
            echo $view->nav1();
            echo $view->side();
            echo $view->home();
            echo $view->footer();
			break;
        case 'delete':
            $controller->delete();
            echo $view->nav1();
            echo $view->side();
            echo $view->home();
            echo $view->footer();
	}
}
// else
// 	echo $view->nav();

?>