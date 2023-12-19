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
    <link rel="stylesheet" href="css/Admin/form.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />

  </head> 

  <body>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="../public/script/email.js"></script>
  <div class="component">
    
      <?php 
  
     
      ?>
      

              <?php 
                        echo $view->addAdminForm($controller->getErrors());
                        //}
                    ?>  
  </div>
  </body>
</html>