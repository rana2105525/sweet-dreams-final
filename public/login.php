<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new Users();
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $controller->{$_POST['action']}();
}
?>

<body>
    <h1>Login</h1>
    <?php echo $view->loginForm(); ?>
</body>
