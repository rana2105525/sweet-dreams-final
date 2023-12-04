<?php

define('__ROOT__', "../../app/");
require_once(__ROOT__ . "model/admin.php");
require_once(__ROOT__ . "controller/ProductsController.php");
require_once(__ROOT__ . "view/ViewAdmin.php");


// $model = new admins();
$controller = new AdminController($model);
$view = new ViewAdmin($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sweet Dreams</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="../../../public/css/Admin/addAdmin.css" />
        <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png"type="image/icon type" />
    </head>
    
<body>
<?php 
        // session_start();

        // // Check if the user is logged in as an admin
        // if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
        //     // Redirect the user to the login page if not logged in as an admin
        //     header("Location: /sweet-dreams/views/pages/");
        //     exit();
        // }
        ?>

       <div class="content">
            <section class="container rows">
                <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div id="title">
                        <h2>Add a new admin</h2>
                    </div>

                    <div class="input-box">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter admin's name" />
                    </div>

                    <div class="input-box">
                        <label for="number">Phone Number</label>
                        <input type="number" id="number" name="number" placeholder="Enter admin's number" />
                    </div>

                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter admin's email" />
                        <span class="error" id="email-error"></span>
                    </div>

                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" />
                    </div>

                    <div class="input-box">
                        <label for="gender">Gender</label>
                    </div>
                    <div class="row">
                        <div class="column">
                            <input type="radio" name="gender" id="male" value="Male">
                            <label for="male">Male</label>
                        </div>
                        <div class="column">
                            <input type="radio" name="gender" id="female" value="Female">
                            <label for="female">Female</label>
                        </div>
                    </div>

                    <button input type="submit" name="submit" id="submit-button" value="submit">Add Admin</button>
                </form>
                <div class="error-container">
                    <?php
                    foreach ($errors as $error) {
                        echo "<p class='error'>$error</p>";
                    }
                    ?>
                </div>
            </section>
        </div>    
</body>
</html>