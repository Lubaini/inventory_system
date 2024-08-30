<?php 

namespace Controllers;

use Route\Page;

class Records extends Page  {
   
   private $data = [];

   public function records() 
   {
      
      if(isset($_GET['value']))
      {
         if($_GET['tbl'] == 'sales') {
             
            $query = 'SELECT users.first_name, users.last_name,
            products.name AS pname,products.price,sales.quantity,
            sales.quantity * products.price AS total_cost,  
            products.station, sales.date_purchased, sales.category
            FROM sales
            INNER JOIN users
            ON users.id = sales.customer_id
            INNER JOIN products
            ON products.id = sales.product_id
            WHERE products.station = ?';

            $this->data = $this->runQuery($query, array($_GET['value']));

         } elseif($_GET['tbl'] == 'invoice'){

            $query = 'SELECT users.first_name, users.last_name,
            products.name, products.price, invoice.quantity,
            invoice.quantity * products.price AS total_cost, invoice.category,
            invoice.destination, invoice.shipping, invoice.invoice_date
            FROM invoice
            INNER JOIN users
            ON users.id = invoice.customer_ID
            INNER JOIN products
            ON products.id = invoice.product_NO
            WHERE products.station = ?';

            $this->data = $this->runQuery($query, array($_GET['value']));

            }elseif($_GET['tbl'] == 'products') {

            // getting records from any name of the table thus passed in the URL and a specific gas station
            $query   = $this->select($_GET['tbl'], 'station');
            $this->data = $this->runQuery($query, array($_GET['value']));
            
         }else {

            // getting records from any name of the table thus passed in the URL and a specific gas station
            $query   = $this->select($_GET['tbl'], 'station', 'user_type');
            $this->data = $this->runQuery($query, array($_GET['value'], 2));
            
         }
      }
      
      // Displaying the page in the browser
      $this->view('pages/superuser/records', $this->data);
   }
}