<?php 
require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/AdminController.php");

class ViewAdmin extends View
{
    public function output(){
		// // $str.="<a href='profile.php?action=edit'>Edit Profile </a><br><br>";
		// // $str.="<a href='profile.php?action=movie'>My Movies </a><br><br>";
		// $str="<a href='login.php?action=login'>Login</a><br><br>";
		// // $str.="<a href='profile.php?action=delete'>Delete Account </a>";
		// return $str;
	}
    function addAdminForm()
    {
        $str = '<link rel="stylesheet" type="text/css" href="../public/css/Admin/addAdmin.css">
        <form action="addAdmin.php?action=insert" method="post" class="form">
            <div id="title">
                <h2>Add a new admin</h2>
            </div>
    
            <div class="input-box">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter admin\'s name"/>
            </div>
    
            <div class="input-box">
                <label for="number">Phone Number</label>
                <input type="number" id="number" name="number" placeholder="Enter admin\'s number" />
            </div>
    
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter admin\'s email" />
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
    
            <button type="submit" name="submit" id="submit-button" value="submit">Add Admin</button>
        </form>';
        return $str;
    }
    function editAdminform()
    {
      $username = $this->model->getUserName();
      $phone = $this->model->getPhone();
      $email = $this->model->getEmail();
      $password = $this->model->getPassword();
      $gender = $this->model->getGender();
      
      $str = '<link rel="stylesheet" type="text/css" href="../public/css/Admin/editAdmin.css">
        <form action="editAdmin.php?action=edit" method="post" class="form">
            <div id="title"><h2>Edit admin</h2></div>
    
            <div class="input-box">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="' . $username . '" placeholder="Enter admin\'s name" />
            </div>
    
            <div class="input-box">
                <label for="number">Phone Number</label>
                <input type="number" id="number" name="number" value="' . $phone . '" placeholder="Enter admin\'s number" />
            </div>
    
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="' . $email . '" placeholder="Enter admin\'s email" />
            </div> 
    
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="' . $password . '" placeholder="Enter your password" />
            </div>
            
            <div class="input-box">
                <label for="gender">Gender</label>
            </div> 
            <div class="row">
                <span class="column">
                    <input type="radio" name="gender" id="male" value="'. $gender .' ">
                    <label for="male">Male</label>
                </span>
                <span class="column">
                    <input type="radio" name="gender" id="female" value="'. $gender .'">
                    <label for="female">Female</label>
                </span>
            </div>
    
            <button type="submit" name="submit">Edit Admin</button>
        </form>';
    
      return $str;
    } 
function displayAdmin()
{
    $username = $this->model->getUserName();
    $phone = $this->model->getPhone();
    $email = $this->model->getEmail();
    $gender = $this->model->getGender();
$str='<!DOCTYPE html>
<html lang="en">
<head>
<title>Sweet Dreams</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../../../public/css/Admin/viewAdmin.css" />
    <link rel="icon" href="../../../public/images/Sweet Dreams logo-01.png" type="image/icon type" />
</head>

<body>
<div class="component">
<div class="content">
  <section class="container rows">
    <div class="form">
      
        <div id="title"><h2>Admin Profile</h2></div>
        <div class="admin-details">
        '.$username.' '.$phone.' '.$email.''.$gender.'

        <button id ="edit"><a href="editAdmin.php?edit='.$this->model->getID().'">Edit Profile</a></button>
        <button id ="delete"><a href="deleteAdmin.php?delete='.$this->model->getID().'">Delete Account</button>

</div>
    </section>
</div>
</div>

</body>
</html>';
    return $str;
}
public function displayAllAdmins()
{
    $admins = $this->model->getAllAdmins();
        
    $str = '  <link rel="stylesheet" href="../../../public/css/Admin/allAdmins.css" />
    <div class="content">
                <div id="header"><h2>Admins</h2></div>
                    <div class="tablecont">
                        <table>
                            <thead class="tablehead">
                                <tr>
                                    <th class="tableHeader">#ID</th>
                                    <th class="tableHeader">Name</th>
                                    <th class="tableHeader">Email</th>
                                    <th class="tableHeader">Phone &nbsp; Number</th>
                                    <th class="tableHeader">Gender</th>
                                </tr>
                            </thead>
                            <tbody>';

    foreach ($admins as $admin) {
        if (isset($admin['ID'])){
            $str .= '<tr>';
            $str .= '<td class="cell">' . $admin['ID'] . '</td>';
            $str .= '<td class="cell">' . $admin['Username'] . '</td>';
            $str .= '<td class="cell">' . $admin['Email'] . '</td>';
            $str .= '<td class="cell">' . $admin['Phone'] . '</td>';
            $str .= '<td class="cell">' . $admin['Gender'] . '</td>';
            $str .= '</tr>';
        }
    }

    $str .= '</tbody></table></div></div>';
    return $str;
}
    
public function Adminsidebar() // partials edited soon
{
      $str = '
      <link rel="stylesheet" href="../../../public/css/Admin/sidebar.css" />
        <a href="../index.php"><img class="logo" src="../../../public/images/Sweet Dreams logo-01.png" alt="logo"></a>
        <a href="../index.php">Home</a>
        <a href="../viewAdmin.admin.php">My Profile</a>
        <a href="../admin/addAdmin.php">Add Admin</a>
        <a href="../allAdmins.admin.php">Admins</a>
        <a href="../admin/allProducts.php">Products</a>
        <a href="../admin/addProduct.php">Add Product</a>
        <a href="../admin/addToBlog.php">Add blog</a>
        <a href="../admin/reviews.php">Reviews</a>
        <a href="../admin/users.php">Users</a>';
      
      return $str;
}


       
       
}

?>