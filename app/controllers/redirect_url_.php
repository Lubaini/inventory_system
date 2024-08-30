<?php 

namespace Controllers;

use Route\Page;

class Redirect_Url_ extends Page  {

   public function redirect_url_() 
   {
      
      // LOADING EFFECTS WHEN LOGGING IN TO THE SYSTEM
      if($_GET['user_type'] == 0){

         $this->view('pages/redirect_url/superuser_redirect_url');

      } elseif($_GET['user_type'] == 1){

         $this->view('pages/redirect_url/administrator_redirect_url');

      }
      
   }
}