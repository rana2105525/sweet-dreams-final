<?php
require_once(__ROOT__ . "controller/Controller.php");

class checkoutController extends Controller {

  public $nameErr ="";
  public $emailErr = "";
  public $phoneErr = "";
  public $addressErr = "";
    public function checkout() {
        
            // Sample data from a hypothetical form or request

            $user_id = $_SESSION['id'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $total_price=$_SESSION['total_price'];
            $orderd_at=date('Y-m-d');
          //   function isValidPhoneNumber($phoneNumber, $desiredLength) {
      
          //     $pattern = '/^\+?[0-9]+$/'; 
          //     $isValidFormat = preg_match($pattern, $phoneNumber);
          
              
          //     $isValidLength = (strlen($phoneNumber) === $desiredLength);
          
          //     return ($isValidFormat && $isValidLength);
          // }
          // if (empty($name)) {
          //   $this->nameErr = "Name is required";
          // } else {
          //   if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
          //     $this->nameErr = "Only letters and white space allowed";
          //   }
          // }
          // if (empty($address)) {
          //   $this->addressErr = "Name is required";
          // } else {
          //   if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
          //     $this->addressErr = "Only letters and white space allowed";
          //   }
          // }
          // if (empty($email)) {
          //   $this->emailErr = "Email is required";
          // } else {
          //   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //     $this->emailErr = "Invalid email format";
          //   }
          // }
          // if (empty($phone)) {
          //   $this->phoneErr = "Phone number is required";
          // } else {
          //   $desiredLength = 11; 
      
          //   if (!isValidPhoneNumber($phone, $desiredLength)) {
          //       $this->phoneErr = "Invalid phone number format or length"; 
          //   }
          // }
      
          // if (empty($this->nameErr) && empty($this->emailErr) && empty($this->phoneErr) && empty($this->addressErr)) {
            // Assuming $this->model is an instance of a model class handling database interactions
            $orderID = $this->model->order($user_id, $name, $email,$phone,$address,$total_price,$orderd_at);
            $user_id = $_SESSION['id'];

    $cartProducts = $this->model->showInCart($user_id);
    foreach ($cartProducts as $cartProduct) {
      $prod_id=$cartProduct['prod_id'];
      $this->model->order_item($user_id,$orderID,$prod_id);
    }
    
  }

  
  public function getErrors() {
      
    $errors = [
      'nameErr' => $this->nameErr,
      'emailErr' => $this->emailErr,
      'phoneErr' => $this->phoneErr,
      'addressErr' => $this->addressErr,
      
    ];
    return $errors;
  }
      
    
    
  


}
?>
