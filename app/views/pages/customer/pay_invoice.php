
<?php include_file('templates/enduserheader'); ?>
<link rel="stylesheet" href="assets/css/cart.css">
<?php

if(isset($_POST['pay_invoice'])) {
                
      $query = 'INSERT INTO sales (customer_id, product_id, quantity, category)
      SELECT customer_ID, Product_NO, quantity, category
      FROM invoice
      WHERE customer_ID = ?';
      $this->execute($query, [$_GET['id']]);
      $this->execute('DELETE FROM invoice WHERE customer_ID = ?', [$_GET['id']]);

      header("Location:http://localhost/inventory_system/app/views/pages/customer/__invoice_redirect_url__.html");

} 
?>
<div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Invoice Payment <br> <span style="font-size:25px;">Or</span></h1>
        </div>
        <a href="<?php echo URL('cart'); ?>" class="checkout-cta text-light bg-dark"> <i class="bi bi-x-lg"></i> Cancel Payment</a>
</div>
<br>

<?php 
      if ($_GET['pm'] !== 'nbm') {?>
        <div style="display: grid; justify-content: center;">
<div class="summary">
        <form method="POST" action="<?php echo URL('pay_invoice&code='.$_GET['code'].'&id='.$_GET['id']); ?>">
        <div class="summary-total-items"><span class="total-items"></span> Enter Your PIN</div>
        <hr>
        <div>
          <div style="font-size:15px;">
          You are paying <span style="font-weight:bold;"><?php echo 'MK'.number_format(decode($_GET['code']), 2); ?></span> to Meru Mount Group.</div>
          <hr>
        </div>
        <div class="summary-delivery">
        <label for="inputPassword4" class="form-label">Enter Phone Number</label>
        <input type="text" class="form-control" required name="dstn" placeholder="Enter Phone Number" id="inputPassword4">
        </div>
        <div class="summary-delivery">
        <label for="inputPassword4" class="form-label">PIN</label>
        <input type="text" class="form-control" required name="dstn" placeholder="<?php echo strtoupper($_GET['pm']);?> PIN" id="inputPassword4">
        </div>
        
        </div>
        <div class="summary-checkout">
          <button type="submit" name="pay_invoice" class="checkout-cta"><i class="bi bi-send"></i> Submit</button>
        </div>
        </form>
    </div>

</div>

      <?php } else{?>
        
        
        <div style="display: grid; justify-content: center;">
<div class="summary">
        <form method="POST" action="<?php echo URL('pay_invoice&code='.$_GET['code'].'&id='.$_GET['id']); ?>">
        <div class="summary-total-items"><span class="total-items"></span> Enter Your NBM Details</div>
        <hr>
        <div>
          <div style="font-size:15px;">
          You are paying <span style="font-weight:bold;"><?php echo 'MK'.number_format(decode($_GET['code']), 2); ?></span> to Meru Mount Group.</div>
          <hr>
        </div>
        <div class="summary-delivery">
        <label for="inputPassword4" class="form-label">Enter Beneficiary Name</label>
        <input type="text" class="form-control" required name="dstn" placeholder="Enter Beneficiary Name" id="inputPassword4">
        </div>
        <div class="summary-delivery">
        <label for="inputPassword4" class="form-label">Enter Beneficiary Account Number</label>
        <input type="text" class="form-control" required name="dstn" placeholder="ACCOUNT NO." id="inputPassword4">
        </div>
        <div class="summary-delivery">
        <label for="inputPassword4" class="form-label">PIN</label>
        <input type="text" class="form-control" required name="dstn" placeholder="PIN" id="inputPassword4">
        </div>
        
        </div>
        <div class="summary-checkout">
          <button type="submit" name="pay_invoice" class="checkout-cta"><i class="bi bi-send"></i> Submit</button>
        </div>
        </form>
    </div>

</div>

        
        <?php } ?>
<br> <br>

