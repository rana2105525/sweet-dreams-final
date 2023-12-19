<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Users</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />
    <link rel="stylesheet" href="css/Admin/allUsers.css" />
  </head> 

  <body>
<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

if (!isset($_SESSION["ID"]) || $_SESSION["ID"] === null) {
  header("Location: index.php");
  exit();
}


$isLogged = isset($_SESSION["id"]);
// if (!$isLogged) {

//     header("Location: login.php");
//     exit();
//     //echo"lol";
// } else {
  
//  $_SESSION['ID'] = $adminDetails['ID'];

$model = new Users();
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);
?>

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

    if (isset($_GET['action']) && !empty($_GET['action'])) {
      switch($_GET['action']){
          case 'delete':
            $controller->delete($_GET['id']);
            header('Location: viewUsers.admin.php');
            break;
      }
    }

    else echo $view->displayAllUsers();
                        //}
    ?>  
          
  </div>
  </body>
</html>