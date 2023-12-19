<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/admin/form.css" />
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />
  </head>  

  <body> 
    <?php
      if (!isset($_SESSION["ID"]) || $_SESSION["ID"] === null) {
        header("Location: index.php");
        exit();
      }
      
      define('__ROOT__', "../app/");
      require_once(__ROOT__ . "model/Blog.php");
      require_once(__ROOT__ . "controller/BlogController.php");
      require_once(__ROOT__ . "view/ViewBlog.php");
      $model = new Blog();
      $controller = new BlogController($model);
      $view = new ViewBlog($controller, $model);

      if (isset($_GET['action']) && !empty($_GET['action'])) {
        switch($_GET['action']){
          case 'insert':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $controller->insert();
            }
            header('Location: blog.admin.php');
            break;
        }
    } 
    else
        echo $view->output(); 
    ?>
  </body>
</html>