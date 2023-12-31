
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
   <?php echo $view->nav();?>
   <?php echo $view->side();?>
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
       

    <?php
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>About | Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="icon" href="../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
    <link rel="stylesheet" href="css/User/about.css" />
</head>

<body>

<nav>
  </nav>

    <section id="aboutUs">
        <div class="cont">
            <h1>This is Sweet Dreams</h1>
            <p>SweetDreams, our baby sleepwear brand, was founded by two sisters who are also mothers. We realized how
                challenging sleepless nights can be for moms and babies during our motherhood journey. In Egypt, we saw
                a lack of information about baby sleep and a shortage of quality sleep products.
            </p>
            <br>

            <p>Inspired by our own experiences as mothers, we set out to create a brand that helps both moms and babies
                sleep better. Our mission is to design safe, unique baby sleepwear that ensures a good night's sleep for
                every baby.
            </p>
            <br>

            <p>
                Our brand is special because we're moms too, and our own babies served as our inspiration. SweetDreams
                is a testament to sisterhood, motherhood, and the commitment to improving the sleep journey for both
                moms and babies in Egypt. We aim to be the guiding light for moms, providing the tools they need for
                their babies to experience sweet, peaceful dreams.
            </p>
            
    </section>
    <?php include '../app/api/chatbot.php'; ?>

</body>

</html>
<?php echo $view->footer();?>