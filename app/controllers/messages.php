<?php 

namespace Controllers;

use Route\Page;

class Messages extends Page  {

   public function messages() 
   {
      $data = $this->runQuery($this->select('products_request'));  

      if (isset($_GET['id'])) {

            $query = $this->Delete('products_request', 'id');
            
            if ($this->execute($query, [$_GET['id']])) {
   
               $this->redirect_url('messages');
            }
      }

      $this->view('pages/superuser/messages', $data);
      
   }
}