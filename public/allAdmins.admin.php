<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Admins.php");
require_once(__ROOT__ . "controller/AdminController.php");
require_once(__ROOT__ . "view/ViewAdmin.php");

if (!isset($_SESSION["ID"]) || $_SESSION["ID"] === null) {
  // Redirect the user to index.php if the session ID is null
  header("Location: index.php");
  exit();
}



$isLogged = isset($_SESSION["ID"]);
;

$model = new Admins();
$controller = new AdminController($model);
$view = new ViewAdmin($controller, $model);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All Admins</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/Admin/allAdmins.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

  </head> 

  <body>
  <div class="component">
    
      <?php 
  
      echo $view->displayAllAdmins();
      ?> 
  </div>
  </body>
</html>