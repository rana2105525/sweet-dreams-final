<?php
require_once(__ROOT__ . "controller/Controller.php");

class UsersController extends Controller{
	public function insert() {
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$phone = $_REQUEST['phone'];
		$password = $_REQUEST['password'];
        $birth=$_REQUEST["birth"];
        $gender=$_REQUEST["gender"];

		$this->model->insertUser($name,$email,$phone,$password,$birth,$gender);
	}

	public function login() {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
        }
		$this->model->verifyLogin($email,$password);
    }
}
?>