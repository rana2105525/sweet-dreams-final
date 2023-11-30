<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <title>Registration form</title>
    <link rel="stylesheet" href="css/User/reg.css">
</head> -->
<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Users.php");
require_once(__ROOT__ . "controller/UsersController.php");
require_once(__ROOT__ . "view/ViewUser.php");

// require_once("css/User/reg.css");

$model = new Users();
$controller = new UsersController($model);
$view = new ViewUser($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}

if(isset($_POST['login']))	{
	$name=$_REQUEST["name"];
	$password=$_REQUEST["password"];
	$sql = "SELECT * FROM reg where name='$name' and password='$password'";
	$dbh = new Dbh();
	$result = $dbh->query($sql);
	if ($result->num_rows == 1){
		$row = $dbh->fetchRow();
		$_SESSION["id"]=$row["id"];
		$_SESSION["name"]=$row["name"];
		header("Location:profile.php");
	}
}
?>
<body>

<?php echo $view->signupForm();?>
</body>
</html>