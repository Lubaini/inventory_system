<?php 

namespace Controllers;

use Route\Page;

class View_Users extends Page  {
   
   private $data = [];

   public function view_users() 
   {
      $query = $this->select('users', 'user_type', 'station');

      $this->data = $this->runQuery($query, [2, $_GET['value']]);

      if (isset($_GET['action'])) {

         $query = $this->Delete('users', 'id');
         
         if ($this->execute($query, [$_GET['id']])) {

            $this->redirect_url('view_users&value='.$_GET['value'].'&tbl=users');
         }
      }
      
      $this->view('pages/administrator/view_users', $this->data);
   }
}