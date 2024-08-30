<?php 

namespace Controllers;

use Route\Page;

class Login extends Page  {

   private $output = [];
   private $data   = [];


   public function login()
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
                     
                     if ($db_data[0]->user_type == 0) {

                        // redirecting to the super user account
                        $_SESSION['super_user'] = $db_data[0];
                        $this->redirect_url('redirect_url_&user_type=0');

                     } elseif($db_data[0]->user_type == 1){

                        // redirecting to the administrator account
                         $this->data['alert'] = "User does not exist.";
                         $this->data['icon']  = "error";
                         $this->data['title']  = "Error";
                         $this->data['post_email'] = $_POST['email'];

                     } elseif($db_data[0]->user_type == 2){

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
      
      // login page
      $this->view('pages/index', $this->data);
   }
}