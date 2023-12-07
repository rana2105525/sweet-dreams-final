<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Review.php");
require_once(__ROOT__ . "controller/ReviewsController.php");
require_once(__ROOT__ . "view/ViewReview.php");



$model = new Review();
$controller = new ReviewsController($model);
$view = new ViewReview($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	$controller->{$_GET['action']}();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <title>Reviews</title>
	</head>
<body>
<div class=title>
    <?php
echo "<h1>Customers reviews</h1>";
?>
</div>

<?php echo $view->review(); ?>
<?php echo $view->footer();?>



</body>
</html>