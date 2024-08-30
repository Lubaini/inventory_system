<?php 

namespace Controllers;

use Route\Page;

class Checkout extends Page  {

   public function checkout() 
   {
      
        $this->view('pages/customer/checkout');
      
   }
}