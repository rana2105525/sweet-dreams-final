<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/admin.php");
require_once(__ROOT__ . "controller/AdminController.php");
require_once(__ROOT__ . "view/ViewAdmin.php");

$model=new admins($_SESSION['ID']);
$controller=new AdminController($model);
$view=new ViewAdmin($controller,$model);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/admin/viewAdmin.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
</head>

<body>
<?php 
      //session_start();
      
    //   // Check if the user is logged in as an admin
    //   if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    //       // Redirect the user to the login page if not logged in as an admin
    //       header("Location: /sweet-dreams/views/pages/");
    //       exit();
    //   }
      ?>

<div class="component">
<div class="sidebar rows">
  <?php // include '../../partials/adminSidebar.php';?>
</div>

<div class="content">
  <section class="container rows">
    <div class="form">
      
        <div id="title"><h2>Admin Profile</h2></div>
        <div class="admin-details">
          <?php
            
            echo $view->displayAdminInfo($model);
          ?>
        </div>
        <button id ="edit"><a href="editAdmin.php">Edit Profile</a></button>
        <button id ="delete"><a href="deleteAdmin.php">Delete Account</button>

</div>
    </section>
</div>
</div>

</body>
</html>