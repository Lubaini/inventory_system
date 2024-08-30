<?php 

namespace Controllers;

use Route\Page;

class View_Sales extends Page  {
   
   private $data = []; 

   public function view_sales() 
   {
      $query = 'SELECT users.first_name, users.last_name, sales.id,
            products.name AS pname,products.price,sales.quantity,
            sales.quantity * products.price AS total_cost,  
            products.station, sales.date_purchased, sales.category
            FROM sales
            INNER JOIN users
            ON users.id = sales.customer_id
            INNER JOIN products
            ON products.id = sales.product_id
            WHERE products.station = ?';

      $this->data = $this->runQuery($query, [$_GET['value']]);

      if (isset($_GET['action'])) {

         $query = $this->Delete('sales', 'id');
         
         if ($this->execute($query, [$_GET['id']])) {

            $this->redirect_url('view_sales&value='.$_GET['value'].'&tbl=sales');
         }
      }
      
      
      $this->view('pages/administrator/view_sales', $this->data);
   }
}