<?php 

namespace Controllers;

use Route\Page;

class Sales_Report extends Page  {

    private $data = [];

    public function sales_report()
    {

      $query = 'SELECT users.first_name, users.last_name,
            products.name AS pname,products.price,sales.quantity,
            sales.quantity * products.price AS total_cost,  
            products.station, sales.date_purchased, sales.category
            FROM sales
            INNER JOIN users
            ON users.id = sales.customer_id
            INNER JOIN products
            ON products.id = sales.product_id';

      $this->data = $this->runQuery($query);

      // echo '<pre>',print_r($this->data),'</pre>';
      

      $this->view('pages/report/sales', $this->data);
    }
   
}