<?php 

namespace Controllers;

use Route\Page;

class Contact extends Page  {

   private $data = [];
      
   public function contact() 
   {
      
      if(isset($_POST['contact'])) {
          
            // GETTING AND INSERTING DATA INTO enquiries TABLE
            $query = $this->insert('enquiries', array('user_id', 'sbj', 'msg'));

            if ($this->execute($query, array($_POST['id'],$_POST['subject'], $_POST['message']))) {
                  
                  $this->data['alert'] = "We have received your message, Thank you so much for contacting us.";
                  $this->data['icon']  = "success";
                  $this->data['title']  = "Received";
            }
   
      }   

      $this->view('pages/customer/contact', $this->data);
      
   }
}