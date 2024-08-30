
<style>
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
.btn {
    background-color: black;
    display: grid;
    justify-content: center;
    padding: 10px;
    cursor: pointer;
}
.btn:hover{
    border: 1px solid black;
    background-color: #fff;
}
.btn:hover a {
    color: black;
}

.btn a {
    text-decoration: none;
    color: #fff;
}











/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
</style>
<a style="background-color: cadetblue; padding:5px; border-radius: 6px; text-decoration:none; color:#fff;" href="<?php echo URL('shop').'&stn='.$_GET['stn'];?>" class="checkout-cta text-light bg-dark">Go Back to shop</a>

<?php 
    $query = 'SELECT products.name, products.price, invoice.quantity,
    invoice.quantity * products.price AS total_cost, invoice.category, invoice.destination,
    invoice.shipping, invoice.invoice_date
    FROM invoice
    INNER JOIN products
    ON products.id = invoice.Product_NO
    WHERE invoice.customer_ID = ?';
    $idata = $this->runQuery($query, [$_GET['id']]);
?>

<table style="font-size:14px;">
  <caption>Invoice Records</caption>
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Cost</th>
      <th scope="col">Category</th>
      <th scope="col">Destination</th>
      <th scope="col">Shipping</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $total = [];
          foreach ($idata as $data) {?>

          <?php array_push($total, $data->price * $data->quantity);?>
    <tr>
      <td data-label="Account"><?php echo $data->name;?></td>
      <td data-label="Due Date"><?php echo 'MK'.number_format($data->price, 2);?></td>
      <td data-label="Amount"><?php echo $data->quantity;?></td>
      <td data-label="Period"><?php echo 'MK'.number_format($data->price * $data->quantity, 2);?></td>
      <td data-label="Account"><?php echo $data->category;?></td>
      <td data-label="Due Date"><?php echo $data->destination;?></td>
      <td data-label="Amount"><?php echo $data->shipping;?></td>
      <td data-label="Period"><?php echo date("d-m-Y", strtotime($data->invoice_date));?></td>
    </tr>    
    <?php } ?>
    <tr>
      <td data-label="Account"></td>
      <td data-label="Due Date"></td>
      <td data-label="Amount"></td>
      <td data-label="Period"></td>
      <td data-label="Account"></td>
      <td data-label="Due Date"></td>
      <td data-label="Amount"><b>TOTAL</b></td>
      <td data-label="Period"><?php echo 'MK'.number_format(array_sum($total), 2);?></td>
    </tr>
  </tbody>
</table>


<?php 
      if (!empty($idata)) {?>
<div class="btn">
    <div>
    <a href="<?php echo URL('invoice_payment&coded='.encode(array_sum($total)).'&id='.$_GET['id']); ?>" class="checkout-cta text-light bg-dark">CHECKOUT</a>
    </div>
</div>

      <?php }
?>