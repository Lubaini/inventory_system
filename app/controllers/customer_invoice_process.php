<?php 

namespace Controllers;

use Route\Page;

class Customer_Invoice_Process extends Page  {
   private $data = [];
   public function customer_invoice_process() 
   {

      $this->view('pages/customer/customer_invoice_process');
      
   }
}