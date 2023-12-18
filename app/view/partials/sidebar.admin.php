<?php
function sidebar(){
$str ='<div class="sidebar rows">
  <a href="../public/index.php"><img class ="logo" src="../public/images/Sweet Dreams logo-01.png" alt="logo" ></a>
  <a href="../public/index.php">Home</a>
  <a href="../public/viewAdmin.admin.php">My Profile</a>
  <a href="../public/addAdmin.admin.php">Add Admin</a>
  <a href="../public/addProduct.admin.php">Add Product</a>
  <a href="../public/blog.admin.php">Add blog</a>
  <a href="../public/allAdmins.admin.php">Admins</a>
  <a href="../public/products.admin.php">Products</a>
  <a href="../public/reviews.admin.php">Reviews</a>
  <a href="../public/viewUsers.admin.php">Users</a>
  <a href="../public/orders.admin.php">Users orders</a>
  <a href="/">Logout</a>
</div>';
return $str;
}
?>