<?php 

namespace Controllers;

use Route\Page;

class Customer_Invoice extends Page  {

   public function customer_invoice() 
   {
    
    $this->view('pages/customer/invoice');
      
   }
}