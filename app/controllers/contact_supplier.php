<?php 

namespace Controllers;

use Route\Page;

class Contact_Supplier extends Page  {


      private $data = [];

   public function contact_supplier() 
   {
      if(isset($_POST['contact']))
      {
                
        $this->VALIDATE_DESCRIPTION($_POST['msg'], 'Message');
        
        if (count($this->valid_data) == 1) {
         
         $columns = ['user_id', 'station' , 'message'];
         
         $query = $this->Insert('products_request', $columns);

         if ($this->execute($query, array($_POST['user_id'], $_POST['stn'], $_POST['msg']))) {
                
                  $this->data['alert'] = "Message successfully sent.";
                  $this->data['icon']  = "success";
                  $this->data['title']  = "Successful";

         } else {

                  $this->data['alert'] = "Unable to add the product.";
                  $this->data['icon']  = "error";
                  $this->data['title']  = "Error";
         }

        } else {

                  $this->data['alert'] = "Please check input fields.";
                  $this->data['icon']  = "error";
                  $this->data['title']  = "Invalid data";

        }

      }
      $this->view('pages/administrator/contact_supplier', $this->data);
      
   }
}