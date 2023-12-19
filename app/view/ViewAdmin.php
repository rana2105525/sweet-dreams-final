<?php 
require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "view/partials/sidebar.admin.php");


class ViewAdmin extends View
{
    public function output(){
        $username = $this->model->getUserName();
        $phone = $this->model->getPhone();
        $email = $this->model->getEmail();
        $gender = $this->model->getGender();

	echo sidebar();

    $str='<div class="content">
      <section class="container rows">
        <div class="form">
        <div id="title"><h2>Admin Profile</h2></div>
        <div class="admin-details">
        <label for="name">Name: &nbsp;</label>'.$username.' </div>
        <div class="admin-details">
        <label for="number">Phone Number: &nbsp;</label>'.$phone.' </div>
        <div class="admin-details">
        <label for="email">Email: &nbsp;</label>'.$email.'</div>
        <div class="admin-details">
        <label for="gender">Gender: &nbsp;</label>'.$gender.'</div>

        <button id ="edit"><a href="editAdmin.admin.php?edit='.$this->model->getID().'">Edit Profile</a></button>
        <button id="delete"><a href="viewAdmin.admin.php?action=delete&delete='.$this->model->getID().'">Delete Account</button>


</div>
    </section>
</div>';
    return $str;
}
	
    
    public function dashboard(){

  $str='
	<!-- Boxicons -->
	<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
	<!-- My CSS -->
	<link rel="stylesheet" href="../public/css/Admin/dashboard.css">
    <!-- Sidebar -->
	<section id="sidebar">
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class="bx bxs-dashboard"></i>
                    <span class="text">Sweet Dreams</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-shopping-bag-alt" ></i>
                    <span class="text">Add product</span>
                </a>
            </li>
            <li> 
                <a href="#">
                    <i class="bx bxs-doughnut-chart" ></i>
                    <span class="text">Products</span>
                </a>
            </li>
              <li>
                <a href="#">
                    <i class="bx bxs-user" ></i>
                    <span class="text">Add Admin</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-user" ></i>
                    <span class="text">Admins</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-message-dots" ></i>
                    <span class="text">Messages</span>
                </a>
            </li>
            <li>
            <a href="#">
                <i class="bx bxs-message-dots" ></i>
                <span class="text">Orders</span>
            </a>
        </li>
          
            <li>
                <a href="#">
                    <i class="bx bx-store-alt" ></i>
                    <span class="text">Add blog</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-store-alt"></i>
                    <span class="text">Reviews</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-store-alt"></i>
                    <span class="text">Users</span>
                </a>
            </li>
        </ul>
            <ul class="side-menu">
                <li>
                    <a href="#" class="logout">
                        <i class="bx bxs-exit" ></i>
                        <span>Logout</span>
                    </a>
                </li>
            
            </ul>
    </section>
    <!-- Sidebar -->

//     <!-- CONTENT -->
//     <section id="content">
   

//         <!-- MAIN -->
//         <main>
//             <div class="head-title">
//                 <div class="left">
//                     <h1>Dashboard</h1>
//                     <ul class="breadcrumb">
//                         <li>
//                             <a href="#">Dashboard</a>
//                         </li>
//                         <li><i class="bx bxs-chevron-right" ></i></li>
//                         <li>
//                             <a class="active" href="#">Home</a>
//                         </li>
//                     </ul>
//                 </div>
              
//             </div>
//             <ul class="box-info">
//                 <li>
//                     <i class="bx bxs-calendar-check" ></i>
//                     <span class="text">
//                         <h3>1020</h3>
//                         <p>New Orders</p>
//                     </span>
//                 </li>
//                 <li>
//                     <i class="bx bxs-group" ></i>
//                     <span class="text">
//                         <h3>2834</h3>
//                         <p>Approved</p>
//                     </span>
//                 </li>
//                 <li>
//                     <i class="bx bxs-dollar-circle" ></i>
//                     <span class="text">
//                         <h3>25000</h3>
//                         <p>Shipped</p>
//                     </span>
//                 </li>
//             </ul>


//             <div class="table-data">
// 				<div class="order">
// 					<div class="head">
// 						<h3>Recent Orders</h3>
						
// 					</div>
// 					<table>
// 						<thead>
// 							<tr>
// 								<th>User</th>
// 								<th>Date Order</th>
// 							</tr>
// 						</thead>
// 						<tbody>
// 							<tr>
// 								<td>
									
// 									<p>mmmmm</p>
// 								</td>
// 								<td>mmm</td>
// 							</tr>
// 							<tr>
// 								<td>
									
// 									<p>dtfygu</p>
// 								</td>
// 								<td>tguy</td>
// 							</tr>
// 							<tr>
// 								<td>
									
// 									<p>tfugyhikr</p>
// 								</td>
// 								<td>30-9-2023</td>
// 							</tr>
// 							<tr>
// 								<td>
									
									<p>tuyhi</p>
								</td>
								<td>10-4-2023</td>
							</tr>
							<tr>
								<td>
									
									<p>sedtrfytu</p>
								</td>
								<td>15-2-2023</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				</div>
			</div>
        </main>
        <!-- MAIN -->
    </section>
 ';
 return $str;
  }
    function addAdminForm($errors=[]) 
    {
	    echo sidebar(); 
            
            $str = '
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="../public/script/email.js"></script>
            <div class="content"> <section class="container rows">
        <form action="addAdmin.admin.php?action=insert" method="post" class="form">
            <div id="header"><h2>Add a new admin</h2></div>
    
            <div class="input-box">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter admin\'s name"/>
                <span class="error">' . ($errors['nameErr'] ?? '') . '</span>
            </div>
    
            <div class="input-box">
                <label for="number">Phone Number</label>
                <input type="number" id="number" name="number" placeholder="Enter admin\'s number" />
                <span class="error">' . ($errors['phoneErr'] ?? '') . '</span>
            </div>
    
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter admin\'s email" />
                <span class="error">' . ($errors['emailErr'] ?? '') . '</span>
                <span class="error" id="email-error"></span>
            </div>
    
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" />
                <span class="error">' . ($errors['passwordErr'] ?? '') . '</span>
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
                <span class="error">' . ($errors['genderErr'] ?? '') . '</span>
            </div>
    
            <button type="submit" name="submit" id="submit-button" value="submit">Add Admin</button>
        </form></section></div>';
        return $str;
    }
    function editAdminform($errors=[])
    {        
      $username = $this->model->getUserName();
      $phone = $this->model->getPhone();
      $email = $this->model->getEmail();
      
      $str='<div class ="component">';
      echo sidebar();
      $str.='<div class ="content rows">';
      $str.='<section class="container">';
      $str.=' 
        <form action="editAdmin.admin.php?action=edit" method="post" class="form">
            <div id="header"><h2>Edit admin</h2></div>
    
            <div class="input-box">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="' . $username . '" placeholder="Enter admin\'s name" />
                <span class="error">' . ($errors['nameErr'] ?? '') . '</span>
            </div>
    
            <div class="input-box">
                <label for="number">Phone Number</label>
                <input type="number" id="number" name="number" value="' . $phone . '" placeholder="Enter admin\'s number" />
                <span class="error">' . ($errors['phoneErr'] ?? '') . '</span>
            </div>
    
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="' . $email . '" placeholder="Enter admin\'s email" />
                <span class="error">' . ($errors['emailErr'] ?? '') . '</span>
            </div> 
            <button type="submit" name="submit">Edit Admin</button>
        </form>';
        $str.='</section>';
		$str.='</div>';
		$str.='</div>';
    
      return $str;
    } 

public function displayAllAdmins()
{
    $admins = $this->model->getAllAdmins();
	echo sidebar();
        
    $str = '  
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
    return $str;}

    
}
?>