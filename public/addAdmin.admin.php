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
$view = new ViewAdmin($controller, $model);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $controller->insertA();
  header("location: login.php");  // Handle the form submission for adding a new admin
}
// if (isset($_GET['action']) && !empty($_GET['action'])) {
// 	$controller->{$_GET['action']}();
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/Admin/addAdmin.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

  </head> 

  <body>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="../public/script/email.js"></script>
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
                        echo $view->addAdminForm($controller->getErrors());
                        //}
                    ?>  
  </div>
  </body>
</html>