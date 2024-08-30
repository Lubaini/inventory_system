<?php 

namespace Controllers;

use Route\Page;

class Cart extends Page  {
   private $data = [];
   public function cart() 
   {
      if (isset($_GET['stn'])) {

         $this->data['items'] = $this->runQuery($this->select('products', 'station'), [$_GET['stn']]);
         $this->data['class'] = $this->runQuery($this->select('categories'));

      }
             
      
      $this->view('pages/customer/cart', $this->data);
      
   }
}