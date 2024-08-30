<?php 

namespace Controllers;

use Route\Page;

class About extends Page  {

   public function about() 
   {
      
         $this->view('pages/customer/about');
      
   }
}