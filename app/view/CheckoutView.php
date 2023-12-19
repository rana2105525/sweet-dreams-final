<?php
require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/checkoutController.php");

class CheckoutView extends View
{
    public function output($errors = [])
    {
        $str = '
        <link rel="stylesheet" href="../public/css/User/checkout.css" />
            <h1 style="color:#F27144;
            text-align:center;
            justify-content:center;
            margin-top:20px;">Checkout</h1>
        <section class="container">
       
    <form action="checkout.php?action=checkout" method="post" >

                <div class="input-box">
                <label>Name</label>
                <input type="text" name="name"  required />  
                <span class="error">' . ($errors['nameErr'] ?? '') . '</span>

            </div>

            <div class="input-box">
            <label>Email</label>
            <input type="text" name="email"  required />  
            <span class="error">' . ($errors['emailErr'] ?? '') . '</span>


            </div>
            <div class="input-box">
            <label>Phone</label>
            <input type="text" name="phone"  required /> 
            <span class="error">' . ($errors['phoneErr'] ?? '') . '</span> 
            

            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address"  required /> 
                <span class="error">' . ($errors['addressErr'] ?? '') . '</span> 
      

            </div>

            </div>
            </div>


            <button type="submit" name="submit" value="Submit">Checkout</button>
 
             </form>
        </section>


';
        return $str;

    }
    public function footer()
    {
      echo footer();
    }
   
}


