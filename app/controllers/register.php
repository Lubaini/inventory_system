<?php 

namespace Controllers;

use Route\Page;

class Register extends Page  {
   
   private $data = [];
   public function register()
    {
        if(isset($_POST['register']))
        {
            // VALIDATING IF THE USER HAS PROVIDED CORRECT DATA
            $this->VALIDATE_STRING($_POST['fname'], 'First name');
            $this->VALIDATE_STRING($_POST['sname'], 'Surname');
            $this->VALIDATE_EMAIL(htmlspecialchars($_POST['email']));
            $this->VALIDATE_NUM($_POST['phone']);
            $this->VALIDATE_STRING($_POST['location'], 'Location');
            $this->VALIDATE_STRING($_POST['stn'], 'Station');
            $this->VALIDATE_PASSWORD(htmlspecialchars($_POST['password']));


            if(count($this->valid_data) == 7)
            {

                // GETTING DATA FROM DATABASE
                $query  = $this->select('users');
                $database_data = $this->runQuery($query);

                // CHECKING IF THE USERNAME PASSED IN THE FORM IS ALREADY AVAILABLE IN THE DATABASE
                $key    = array_search($_POST['email'], array_column($database_data, 'fname'));
                
                if(gettype($key) == 'boolean')
                {
                    
                    $query   = $this->select('users', 'email');
                    $db_data = $this->runQuery($query, array($this->valid_data[2]));

                    if ($db_data[0]->email == $this->valid_data[2]) {

                        $this->data['alert'] = "Email is already in use.";
                        $this->data['icon']  = "error";
                        $this->data['title']  = "Error";
                        $this->data['post_email'] = $_POST['email'];
                        
                    } else {
                        //INSERTING DATA FROM REGISTERING FORM  INTO DATABASE IF THE USERNAME IS NOT
                    // AVAILABLE
                    $query = $this->insert('users',
                    array('first_name', 'last_name', 'email', 'phone_number', 'location', 'station', 'password', 'user_type'));
                    array_push($this->valid_data, 2);
                    $this->runQuery($query, $this->valid_data);

                    $query   = $this->select('users', 'email');
                    $db_data = $this->runQuery($query, array($this->valid_data[2]));
                    
                    session_start();
                    $_SESSION['customer'] = $db_data[0];
                    $_SESSION['cart'] = [];
                    header("Location:http://localhost/inventory_system/app/views/pages/customer/login_redirect_url.html");

                    }


                } else{

                    $this->data['alert'] = "Email is already in use.";
                    $this->data['icon']  = "error";
                    $this->data['title']  = "Oops";
                    $this->data['post_email'] = $_POST['email'];
                    
                }

            } else {

                // $this->data['errors'] = $this->error; 
                $this->data['alert'] = "Please check your inputs fields correctly.";
                $this->data['icon']  = "error";
                $this->data['title']  = "Invalid data";
                $this->data['post_email'] = $_POST['email'];

                // print_r($this->data);
            }
        }
         
      $this->view('pages/customer/register', $this->data);
   }
}