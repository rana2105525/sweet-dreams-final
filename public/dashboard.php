<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
</head>
<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/admin.php");
require_once(__ROOT__ . "model/Admins.php");
require_once(__ROOT__ . "controller/AdminController.php");
require_once(__ROOT__ . "view/ViewAdmin.php");


$model = new Admins();
$controller = new AdminController($model);
$view = new ViewAdmin($controller, $model);
echo $view->dashboard();


?>