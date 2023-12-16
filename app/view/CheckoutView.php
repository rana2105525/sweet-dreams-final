<?php
require_once(__ROOT__ . "view/View.php");
require_once(__ROOT__ . "controller/Controller.php");
require_once(__ROOT__ . "controller/checkoutController.php");

class CheckoutView extends View
{
    public function output()
    {
        $str = '
    <section class="container">

    <form   action="checkout.php?action=checkout" method="POST" >

                <div class="input-box">
                <label>Name</label>
                <input type="text" name="name"  required />  
                

            </div>

            <div class="input-box">
            <label>Email</label>
            <input type="text" name="email"  required />  
            <span class="error"><?php echo $addressErr; ?></span>

            </div>
            <div class="input-box">
            <label>Phone</label>
            <input type="text" name="phone"  required />  
            

            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address"  required />  
      

            </div>

            </div>
            </div>


            <button input type="submit" name="submit" value="Submit">Checkout</button>
        </form>
    </section>

';
        return $str;

    }
    
}


