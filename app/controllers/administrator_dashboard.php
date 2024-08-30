<?php 

namespace Controllers;

use Route\Page;

class Administrator_Dashboard extends Page  {
   

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

   public function administrator_dashboard() 
   {
      // CALCULATING NUMBER OF PRODUCTS FOR EACH STATION
      $data['station_a_products_num'] = $this->runQuery($this->column_sum('quantity', 'products','station'), [$_GET['stn']]);
      $data['sales'] = $this->runQuery($this->count_where('sales', 'station'), [$_GET['stn']]);
      $data['invoice'] = $this->runQuery($this->count_where('invoice', 'station'), [$_GET['stn']]);
         
      // CALCULATING REVENUE FOR EACH STATION
      $data['revenue_a'] = $this->runQuery($this->aggregate(), [$_GET['stn']]);

      // CALCULATING PROFITS FOR EACH STATION
      $data['profit_a'] = $data['revenue_a'][0]->revenue;
   
      // Super User Dashboard
      $this->view('pages/administrator/dashboard', $data);
   }
}