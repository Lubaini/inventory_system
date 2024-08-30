<?php include_file('templates/enduserheader'); ?>
<?php include_file('templates/enduser_navbar'); ?>
<?php include_file('controllers/remove_item'); ?>
<link rel="stylesheet" href="assets/css/cart.css">
<?php 
            
$TOTAL = [];


foreach ($_SESSION['cart'] as $cost)
{
    array_push($TOTAL, $cost['price'] * $cost['qty']);
}

?>

<main>
    <br><br><br>
    <div class="basket">
    <?php if(!count($_SESSION['cart']) == 0) {?>
              <div class="summary-checkout">
          <a href="http://localhost/inventory_system/app/views/pages/customer/invoice_redirect_url.html" class="checkout-cta text-light bg-dark">Process Invoice</a>
    </div>
    <?php } ?>
      <form>
      <div class="basket-labels">
        <ul class="ul">
          <li class="li item item-heading">Item</li>
          <li class="li price">Price</li>
          <li class="li quantity">Quantity</li>
          <li class="li subtotal">Subtotal</li>
        </ul>
      </div>
      <?php 
        foreach ($_SESSION['cart'] as $item) {?>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="assets/img/<?php echo $item['img']; ?>" alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <h1><?php echo $item['dsp']; ?> <strong>X <?php echo $item['kg'].'KG'; ?></strong></h1>
            <p><strong><?php echo $item['name']; ?></strong></p>
            <?php
                 if ($item['category'] == 'new') {?>
                  <p>Serial Number - <?php echo $item['snum']; ?></p>
                 <?php } elseif ($item['category'] == 'refill') {?>
                  <p>
                  <p class="basket-module">
                  <span class="text-bold">To refill:</span>
                    <input placeholder="Enter Product Serial Number" type="text" name="snum" class="form-control" required>
                  </p>
                  </p>
                 <?php } else{?>
                  <p>Serial Number - <?php echo $item['snum']; ?></p>
                 <?php } ?>
          </div>
        </div>
        <div class="price"><?php echo 'MK'.number_format($item['price'], 2); ?></div>
        <div class="quantity text-center">
          <?php echo $item['qty']; ?>
        </div>
        <div class="subtotal"><?php echo 'MK'.number_format($item['price'] * $item['qty']); ?></div>
        <div class="remove">
           <a href="<?php echo URL('cart');?>&action=delete&id=<?php echo $item["id"];?>" class="btn btn-danger text-light btn-sm px-3"> <i class="bi bi-trash"></i> remove</a>
        </div>
      </div>

      <?php }?>
    </div>



    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Raw Total</div>
          <div class="subtotal-value final-value" id="basket-subtotal"><?php echo array_sum($TOTAL); ?></div>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery" required>
          <select name="delivery-collection" class="summary-delivery-selection">
            <option value="0" selected="selected">Select Collection or Delivery</option>
            <option value="collection">Customer Collection</option>
            <option value="signed-for">Company Delivery</option>
          </select>
        </div>
        <div class="total-title">Total</div>
        <div class="summary-total">
          <div  class="total-value final-value" id="basket-total">
            <?php echo 'MK'.number_format(array_sum($TOTAL), 2); ?>
          </div>
        </div>
        <div class="summary-checkout">
          <a href="<?php echo URL('checkout&code='.encode(array_sum($TOTAL)));?>" class="checkout-cta text-light bg-dark">Go to Secure Checkout</a>
        </div>
      </div>
    </aside>
    </form>
    
  </main>
  <br><br><br>
  <script type="text/javascript">
    setTimeout(function(){
        window.location.reload();
    }, 15000);       
</script>
<?php include_file('templates/enduserfooter'); ?>