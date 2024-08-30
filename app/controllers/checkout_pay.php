<?php 

namespace Controllers;

use Route\Page;

class Checkout_Pay extends Page  {
   private $data = [];
   public function checkout_pay() 
   {
      
      $this->view('pages/customer/checkout_pay');
      
   }
}