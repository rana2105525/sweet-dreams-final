<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");


$isLogged=isset($_SESSION["id"]);
if($isLogged)
{
?>
<?php
    $model = new User($_SESSION["id"]);
    $controller = new UsersController($model);
    $view = new ViewUser($controller, $model);
    ?>
    <body>
    
   <?php echo $view->nav();?>
   <?php echo $view->side();?>
   <?php echo $view->home();?>
   <?php echo $view->footer();?>
  
</body>
<?php
}
else{
    ?>
    <?php
        $model = new Users();
        $controller = new UsersController($model);
        $view = new ViewUser($controller, $model);
        ?>
        <body>
        
       <?php echo $view->nav1();?>
       <?php echo $view->side();?>
       <?php echo $view->home();?>
       <?php echo $view->footer();?>
       
    </body>
    <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Home | sweet dreams</title>
    
	</head>
  <body>
  <?php include '../app/api/chatbot.php'; ?>
  </body>

</html>