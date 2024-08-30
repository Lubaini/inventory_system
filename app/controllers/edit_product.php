<?php 

namespace Controllers;

use Route\Page;

class Edit_Product extends Page  {

   private $data = [];
   

   public function edit_product() 
   {
      
      
      if (isset($_GET['id'])) {
         
         $this->data = $this->runQuery($this->select('products', 'id'), [$_GET['id']]);
      }
      
      if(isset($_POST['editProduct']))
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
         
         array_push($this->valid_data, $_POST['id']);

         $columns = ['snum', 'image', 'name', 'price', 'description', 'kg', 'quantity' , 'station'];
         
         $query = $this->Update('products', $columns, 'id');

         if ($this->execute($query, $this->valid_data)) {
                
                  $this->data['alert'] = "Product successfully updated";
                  $this->data['icon']  = "success";
                  $this->data['title'] = "Successful";

         } else {

                  $this->data['alert'] = "Unable to add the product";
                  $this->data['icon']  = "error";
                  $this->data['title'] = "Error";
         }

        } else {
         print_r($this->error);
        }

      }

      $this->view('pages/administrator/edit_product', $this->data);
   }
}