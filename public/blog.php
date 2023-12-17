<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Blog.php");
require_once(__ROOT__ . "controller/BlogController.php");
require_once(__ROOT__ . "view/ViewBlog.php");


$model = new Blog();
$controller = new BlogController($model);
$view = new ViewBlog($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="icon" href="images/Sweet Dreams logo-01.png"type="image/icon type" />
	</head>
<body>
<div class=title>
    <?php
echo "<h1>Blog</h1>";
?>
</div>

<?php echo $view->blog(); ?>
<?php echo $view->footer();?>


<?php include '../app/api/chatbot.php'; ?>
</body>
</html>