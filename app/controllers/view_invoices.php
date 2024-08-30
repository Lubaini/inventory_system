<?php 

namespace Controllers;

use Route\Page;

class View_Invoices extends Page  {
   
   private $data = [];

   public function view_invoices() 
   {
      $query = 'SELECT users.first_name, users.last_name, invoice.Invoice_ID, invoice.station,
      products.name AS pname, products.price, invoice.quantity,
      invoice.quantity * products.price AS total_cost, products.description,  
      invoice.payment_status, invoice.shipping, invoice.destination, invoice.category, products.station, invoice.invoice_date
      FROM invoice
      INNER JOIN users
      ON users.id = invoice.customer_id
      INNER JOIN products
      ON products.id = invoice.product_NO
      WHERE invoice.station = ? ';

      $this->data = $this->runQuery($query, [$_GET['value']]);

      if (isset($_GET['action'])) {

         $query = $this->Delete('invoice', 'Invoice_ID');
         
         if ($this->execute($query, [$_GET['id']])) {

            $this->redirect_url('view_invoices&value='.$_GET['value'].'&tbl=invoice');
         }
      }
      
      $this->view('pages/administrator/view_invoices', $this->data);
   }
}