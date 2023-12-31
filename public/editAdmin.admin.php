<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/admin.php");
require_once(__ROOT__ . "model/Admins.php");
require_once(__ROOT__ . "controller/AdminController.php");
require_once(__ROOT__ . "view/ViewAdmin.php");


if (!isset($_SESSION["ID"]) || $_SESSION["ID"] === null) {
  header("Location: index.php");
  exit();
}
$isLogged = isset($_SESSION["ID"]);


$model = new Admin($_SESSION["ID"]);
$controller = new AdminController($model);
$view = new ViewAdmin($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	if ($_GET['action'] === 'edit') {
    $controller->editA(); 
    header("location: viewAdmin.admin.php"); 
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="css/Admin/form.css">
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
     
      ?>
      

              <?php 
                        echo $view->editAdminForm($controller->getErrors());
                        //}
                    ?>  
  </div>
  </body>
</html>