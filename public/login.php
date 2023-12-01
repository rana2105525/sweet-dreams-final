<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

$model = new Users();
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $controller->{$_POST['action']}();
}
if(isset($_POST['login']))	{
	$email=$_REQUEST["email"];
	$password=$_REQUEST["password"];
	$sql = "SELECT * FROM reg where email='$email' and password='$password'";
	$dbh = new Dbh();
	$result = $dbh->query($sql);
	if ($result->num_rows == 1){
		$row = $dbh->fetchRow();
		$_SESSION["id"]=$row["id"];
		$_SESSION["email"]=$row["email"];
		header("Location:index.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
    <section class="container">
    <a href="index.php"><img src="images/sweet dreams logo-01.png" alt="logo"></a>
    <?php echo $view->loginForm(); ?>
    </section>
</body>
</html>
