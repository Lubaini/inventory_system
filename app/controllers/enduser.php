<?php 

namespace Controllers;

use Route\Page;

class EndUser extends Page  {

   private $data   = [];
   public function EndUser() 
   {
      if (isset($_POST['login'])) {
         
         // VALIDATING INPUT DATA FROM THE LOGIN FORM WITH PHP
         $this->VALIDATE_EMAIL($_POST['email']);
         $this->VALIDATE_PASSWORD($_POST['password']);


         if (count($this->valid_data) == 2) {

               // GETTING DATA FROM DATABASE IN USERS TABLE ACCORDING TO DATA PROVIDED IN THE FORM
               $query   = $this->select('users', 'email', 'password');
               $db_data = $this->runQuery($query, array($_POST['email'], $_POST['password']));

               // CHECKING IF IT DOES NOT RETURNS NOTHING
               if (!empty($db_data)) {

                     sleep(2);
                     session_start();
                     
                     if ($db_data[0]->user_type == 2) {

                        // redirecting to the super user account
                        $_SESSION['customer'] = $db_data[0];
                        $_SESSION['cart'] = [];
                        header("Location:http://localhost/inventory_system/app/views/pages/customer/login_redirect_url.html");

                     } else {

                        // redirecting to the user account
                        $this->data['alert'] = "User does not exist.";
                        $this->data['icon']  = "error";
                        $this->data['title']  = "Error";
                        $this->data['post_email'] = $_POST['email'];
                     }
                   
               } else {
                  
                  $this->data = [
                              'error'  => 'Wrong Email or Password',
                              'post_email'  => $_POST['email']
                           ];
               }
         } else {
            
            $this->data = [
                        'email' => $this->error['email'] ?? NULL,
                        'post_email'    => $_POST['email'],
                        'password' => $this->error['password'] ?? NULL
                     ];

         }

      }
      
      
      $this->view('pages/customer/login', $this->data);
   }
}