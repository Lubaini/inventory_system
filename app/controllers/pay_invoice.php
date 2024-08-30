<?php 

namespace Controllers;

use Route\Page;

class Pay_Invoice extends Page  {

   public function pay_invoice() 
   {
      
         $this->view('pages/customer/pay_invoice');
      
   }
}