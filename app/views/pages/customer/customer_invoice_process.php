<?php include_file('templates/enduserheader'); ?>
<link rel="stylesheet" href="assets/css/cart.css">
<?php

if(isset($_POST['invoice'])) {
          
    // GETTING AND INSERTING DATA INTO enquiries TABLE
    $query = $this->insert('invoice', array('customer_ID', 'Product_NO',
                           'quantity', 'category', 'payment_status',
                            'destination', 'shipping', 'station'));

    $update   = $this->update__('products', array('quantity'), 'id', 'station');

    foreach ($_SESSION['cart'] as $keys => $value) {
        
      $this->execute($update, array(($value['qty'] - $value['quantity']), $value['id'], $value['stn']));

      $this->execute($query, array($_SESSION['customer']->id, $value['id'], 
                     $value['quantity'],$value['category'],'Unpaid', $_POST['dstn'], $_POST['delivery'], $value['stn']));

      unset($_SESSION["cart"][$keys]);

      header("Location:http://localhost/inventory_system/app/views/pages/customer/__invoice_redirect_url.html");
    }

} 
?>
<div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Process Invoice <br> <span style="font-size:25px;">Or</span></h1>
        </div>
        <a href="<?php echo URL('cart'); ?>" class="checkout-cta text-light bg-dark"> <i class="bi bi-x-lg"></i> Cancel Invoice Process</a>
</div>
<br>
<div style="display: grid; justify-content: center;">
<div class="summary">
        <form method="POST" action="<?php echo URL('customer_invoice_process'); ?>">
        <div class="summary-total-items"><span class="total-items"></span> Enter Your Invoice Details</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Collection</div>
          <div class="subtotal-value final-value" id="basket-subtotal"></div>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
          <select name="delivery" class="summary-delivery-selection" required>
            <!-- <option>Select Collection or Delivery</option> -->
            <option value="Customer Collection">Customer Collection</option>
            <option value="company">Company Delivery</option>
          </select>
        </div>
        <div class="summary-delivery">
        <label for="inputPassword4" class="form-label">Items Destination</label>
        <input type="text" class="form-control" required name="dstn" placeholder="Enter Destination" id="inputPassword4">
        </div>
        
        </div>
        <div class="summary-checkout">
          <button type="submit" name="invoice" class="checkout-cta"><i class="bi bi-send"></i> Submit</button>
        </div>
        </form>
    </div>

</div>