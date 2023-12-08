<?php
require_once(__ROOT__ . "controller/Controller.php");
class AdminController extends Controller{

	public function login($email, $password) {
        return $this->model->adminLogin($email, $password);
    }

	public function insert() {
		$name = $_REQUEST['UserName'];
		$email = $_REQUEST['Email'];
		$phone = $_REQUEST['Phone'];
		$password = $_REQUEST['Password'];
        $gender=$_REQUEST["Gender"];

		$this->model->addAmin($name,$email,$phone,$password,$gender);
	}

	public function edit() {
        $name = $_REQUEST['UserName'];
		$email = $_REQUEST['Email'];
		$phoneNumber = $_REQUEST['Phone'];
		$password = $_REQUEST['Password'];
        $gender=$_REQUEST["Gender"];
        
		$this->model->editUser($name, $phoneNumber, $email, $password, $gender);
	}

	public function delete(){
		$this->model->deleteAdmin();
	}
}



?>