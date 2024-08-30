<?php 

namespace Controllers;

use Route\Page;

class SuperUser extends Page  {
   

   private function aggregate()
   {
      // QUERY => CALCULATING REVENUE FROM DATABASE
      $sql = 'SELECT SUM(sales.quantity * products.price) AS revenue 
              FROM sales
              INNER JOIN products
              ON products.id = sales.product_id
              WHERE products.station = ?';

      return $sql;
   }

   public function superuser() 
   {
      // CALCULATING NUMBER OF PRODUCTS FOR EACH STATION
      $data['station_a_products_num'] = $this->runQuery($this->sum('products','quantity', 'station'), ['a']);
      $data['station_b_products_num'] = $this->runQuery($this->sum('products','quantity', 'station'), ['b']);

      // CALCULATING REVENUE FOR EACH STATION
      $data['revenue_a'] = $this->runQuery($this->aggregate(), ['a']);
      $data['revenue_b'] = $this->runQuery($this->aggregate(), ['b']);

      // CALCULATING PROFITS FOR EACH STATION
      if ($data['revenue_a'][0]->revenue == NULL) {
         
         $data['profit_a'] = 0;
          
      } else {

         $data['profit_a'] = $data['revenue_a'][0]->revenue;
      }
      
      if ($data['revenue_b'][0]->revenue == NULL) {
         
         $data['profit_b'] = 0;
          
      } else {

         $data['profit_b'] = $data['revenue_b'][0]->revenue;
      }

      $data['products_DB'] = $this->runQuery($this->select('products'));
      $data['messages'] = $this->runQuery($this->countAll('products_request'));

      $alert = [];
      //product alert
      foreach ($data['products_DB'] as $product) {

         if($product->quantity < 3) {
            
            array_push($alert, $product->name);
            $data['items'] = implode(', ',$alert);
            
         }
      }

      // echo $data['items'];
      

      // Super User Dashboard
      $this->view('pages/superuser/dashboard', $data);
   }
}