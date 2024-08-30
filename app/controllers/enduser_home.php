<?php 

namespace Controllers;

use Route\Page;

class Enduser_Home extends Page  {

   public function enduser_home() 
   {
        $this->view('pages/customer/home');
      
   }
}