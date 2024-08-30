<?php 

namespace Controllers;

use Route\Page;

class Invoice_Payment extends Page  {

   public function invoice_payment() 
   {
      
         $this->view('pages/customer/invoice_payment');
      
   }
}