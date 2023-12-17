<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Admins.php");
require_once(__ROOT__ . "controller/AdminController.php");
require_once(__ROOT__ . "view/ViewAdmin.php");

// Check if the session ID is set before creating an admins object
// $adminId = isset($_SESSION["ID"]) ? $_SESSION["ID"] : null;

// if ($adminId !== null) {
//     $model = new admins($adminId);
//     $controller = new AdminController($model);
//     $view = new ViewAdmin($controller, $model);
// } else {
//     header("Location: login.php");
//     exit();
// }
// or  ↓ ↓ ↓ ↓ ↓

$isLogged = isset($_SESSION["ID"]);
// if (!$isLogged) {

//     header("Location: login.php");
//     exit();
//     //echo"lol";
// } else {
  
//  $_SESSION['ID'] = $adminDetails['ID'];

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
      //session_start();

      // // Check if the user is logged in as an admin
      // if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
      //     // Redirect the user to the login page if not logged in as an admin
      //     header("Location: /sweet-dreams/views/pages/login.php");
      //     exit();
      // } 
      echo $view->displayAllAdmins();
      ?> 
  </div>
  </body>
</html>