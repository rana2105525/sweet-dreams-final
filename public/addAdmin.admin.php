<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/admin.php");
require_once(__ROOT__ . "model/Admins.php");
require_once(__ROOT__ . "controller/AdminController.php");
require_once(__ROOT__ . "view/ViewAdmin.php");

$isLogged = isset($_SESSION["ID"]);
// if (!$isLogged) {

//     header("Location: login.php");
//     exit();
//     //echo"lol";
// } else {
  
//  $_SESSION['ID'] = $adminDetails['ID'];

$model = new Admins();
$controller = new AdminController($model);
$view = new ViewAdmin($controller, $model);//}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />

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
     
      ?>
      

              <?php 
                        echo $view->sideBar();
                        echo $view->addAdminForm();
                    ?>  
  </div>
  </body>
</html>