<?php 

namespace Controllers;

use Route\Page;

class View_Products extends Page  {
   
   private $data = [];

   public function view_products() 
   {
      

      // getting records from any name of the table thus passed in the URL and a specific gas station
      $query   = $this->select('products', 'station');
      $this->data = $this->runQuery($query, array($_GET['value']));


      if (isset($_GET['action'])) {

         $query = $this->Delete('products', 'id');
         
         if ($this->execute($query, [$_GET['id']])) {

            $this->redirect_url('records&value='.$_GET['value'].'&tbl=products');
         }
      }
      
      // Displaying the page in the browser
      $this->view('pages/administrator/view_products', $this->data);
   }
}