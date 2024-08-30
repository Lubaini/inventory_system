<?php 

namespace Controllers;

use Route\Page;

class Add_Product extends Page  {

   private $data = [];
   

   public function add_product() 
   {
      if(isset($_POST['addProduct']))
      {
        $this->VALIDATE_RAND_VAL($_POST['snum'], 'serial number');
        $this->VALIDATE_RAND_VAL($_POST['img'], 'image name');
        $this->VALIDATE_STRING($_POST['pname'], 'product name');
        $this->VALIDATE_NUM($_POST['price']);
        $this->VALIDATE_DESCRIPTION($_POST['description'], 'description');
        $this->VALIDATE_NUM($_POST['kg']);
        $this->VALIDATE_NUM($_POST['qty']);
        $this->VALIDATE_STRING($_POST['station'], 'station');        
        
        if (count($this->valid_data) == 8) {
         
         $columns = ['snum', 'image', 'name', 'price', 'description', 'kg', 'quantity' , 'station'];
         
         $query = $this->Insert('products', $columns);

         if ($this->execute($query, $this->valid_data)) {
                
                  $this->data['alert'] = "Product added successfully.";
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
      // Super User Dashboard
      $this->view('pages/administrator/add_product', $this->data);
   }
}