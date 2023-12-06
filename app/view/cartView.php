<?php

require_once(__ROOT__ . "view/View.php");


class cartView extends View{
    public function output(){

    }

    public function showcart() {
        $str = '<link rel="stylesheet" href="../public/css/User/summer.css" />
                
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />';
    
        $cartProducts = $this->model->showInCart(); // Assuming this retrieves products
    
        foreach ($cartProducts as $cartProducts) {
            $str .= '       
            <div class="prod">
            <div class="product-card">
    
            
            <div class="product-tumb">
            
                                <input type="hidden" name="cart_id" value="' . $cartProducts['id'] . '">
                                
                                <img src="../public/images' . $cartProducts['prod_image'] . '">
    
            
                        </div>
                        <div class="product-details">
                           
                            <h4>' . $cartProducts['name'] . '</h4>
                            <div class="product-bottom-details">
                                <div class="product-price">' . $cartProducts['price'] . 'LE</div>
                               
                        
                                
                            </div>
                                    </div>   ';
        }
    
        // $str .= '</div>';
    
        return $str;
    }
}