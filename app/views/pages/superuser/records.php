<?php
session_start();
?>
<?php include_file('templates/header');?>
<?php include_file('pages/sidebar'); ?>
<?php include_file('pages/topbar'); ?>

<style>
  .flex {
    display: flex;
    justify-content:end;
    padding: 5px;
    gap: 1rem;
  }
</style>
<?php 

if (!empty($data)) {?> 
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">
  <?php
    if ($_GET['value'] == 'a') { ?>
    <span>Area 25 Gas Station</span>
      <?php } ?>
</h1>

<h1 class="h3 mb-2 text-gray-800">
<?php
    if ($_GET['value'] == 'b') { ?>
      <span>Area 49 Gas Station</span>
      <?php } ?>
</h1>



  <?php 
        if($_GET['tbl'] == 'products')
        {?>
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="mb-4">Available products in the stock to this station.</p>
          <h1 class="h3 mb-0 text-gray-800"></h1>
          <?php 
                if (isset($_SESSION['admin'])) {?>
                  <a href="<?php echo URL('add_product'); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                  class="fas fa-wrench fa-sm text-white-50"></i> Add Product</a>
                <?php }
          ?>
       </div>
        <?php }
  ?>

<p class="mb-4">
  <?php 
        if($_GET['tbl'] == 'sales')
        {?>
        Please check in the table below sales taking place to this station.
        <?php }
  ?>
</p>

<p class="mb-4">
  <?php 
        if($_GET['tbl'] == 'users')
        {?>
        List of customers at this station.
        <?php }
  ?>
</p>

<table style="font-size:12px;" class="table shadow table-bordered">
  <div style="color:#4e73df; font-weight: 500;" class="border card-header p-3">
    <?php
    if ($_GET['tbl'] == 'products') { ?>
      <span>Products Available</span>
    <?php } ?>

    <?php
    if ($_GET['tbl'] == 'sales') { ?>
      <span>Sales </span>
    <?php } ?>

    <?php
    if ($_GET['tbl'] == 'invoice') { ?>
      <span>Processed INVOICES</span>
    <?php } ?>

    <?php
    if ($_GET['tbl'] == 'users') { ?>
      <span>Customers List</span>
    <?php } ?>
  </div>

<!-- SHOWS PRODUCTS RESULTS -->

  <?php
        if($_GET['tbl'] == 'products'){?>
        <thead>
    <tr>
    <?php if (isset($_SESSION['admin'])) {?>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Serial Number</span>
        </div>
      </th>
      <?php } ?>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Product</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Description</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Price</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Quantity</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Station</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <?php if (isset($_SESSION['admin'])) {?>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Edit</span>
          <i class="bi bi-gear"></i>
        </div>
      </th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $items) {?>
    <tr>
    <?php if (isset($_SESSION['admin'])) {?>
      <td><?php echo $items->snum; ?></td>
      <?php } ?>
      <td><?php echo $items->name; ?></td>
      <td><?php echo $items->description; ?></td>
      <td><?php echo 'MK'.number_format($items->price, 2); ?></td>
      <td><?php echo $items->quantity; ?></td>
      <td><?php echo ucfirst($items->station); ?></td>
      <?php if (isset($_SESSION['admin'])) {?>
        <td>
          <a href="<?php echo URL('edit_product&id='.$items->id); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
              <i class="fas fa-wrench fa-sm text-white-50"></i> 
              Edit
          </a>
          <a href="<?php echo URL('records&value='.strtolower($_SESSION['admin']->station).'&tbl=products&action=delete&id='.$items->id); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i> 
              Remove
          </a>
      </td>
      <?php } ?>
    </tr>
    <?php }?>
  </tbody>
  
        <?php } ?>
<!-- END -->


<!-- SHOWS SALES RESULTS -->
  <?php

        if($_GET['tbl'] == 'sales'){?>
        <thead>
    <tr>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Buyer</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Item</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Type</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Qty</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Price</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Total Cost</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Station</span>
        </div>
      </th>
      
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Date</span>
        </div>
      </th>
      <?php if (isset($_SESSION['admin'])) {?>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Edit</span>
        </div>
      </th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach ($data as $value) {?>
    <tr>
      <td><?php echo $value->first_name.' '.$value->last_name; ?></td>
      <td><?php echo $value->pname; ?></td>
      <td><?php echo $value->category; ?></td>
      <td><?php echo $value->quantity; ?></td>
      <td><?php echo 'MK'.number_format($value->price, 2); ?></td>
      <td><?php echo 'MK'.number_format($value->total_cost, 2); ?></td>
      <td><?php echo $value->station; ?></td>
      <td><?php echo date("d-m-Y", strtotime($value->date_purchased)); ?></td>
      <?php if (isset($_SESSION['admin'])) {?>
      <td>
      <a href="<?php echo URL('sales_report'); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
              <i class="fas fa-wrench fa-sm text-white-50"></i> 
              Edit
          </a>
      </td>
      <?php }?>
    </tr>
    <?php }?>
    
  </tbody>

  
  
        <?php } ?>
<!-- END -->
<?php if(isset($data['delete'])){?>
    <script>
        Swal.fire({
            icon: '<?php echo $data['icon'];?>',
            title: '<?php echo $data['title'];?>',
            text: '<?php echo $data['delete'];?>'
        });
    </script>
<?php }?>
<!-- INVOICES -->
  <?php
        if($_GET['tbl'] == 'invoice'){?>
        <thead>
    <tr>
    <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Customer</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Product</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Price</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Quantity</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Total</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Category</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Shipping</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Invoice Released Date</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $items) {?>
    <tr>
    <td><?php echo $items->first_name.' '.$items->last_name; ?></td>
      <td><?php echo $items->name; ?></td>
      <td><?php echo 'MK'.number_format($items->price, 2); ?></td>
      <td><?php echo $items->quantity; ?></td>
      <td><?php echo 'MK'.number_format($items->total_cost, 2); ?></td>
      <td><?php echo ucfirst($items->category); ?></td>
      <td><?php echo ucfirst($items->shipping); ?></td>
      <td><?php echo ucfirst($items->invoice_date); ?></td>
    </tr>
    <?php }?>
  </tbody>
  
        <?php } ?>
<!-- END -->


<!-- USERS -->

  <?php
        if($_GET['tbl'] == 'users'){?>
        <thead>
    <tr>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Name</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Email</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Contact</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Location</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Date Registered</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $value) {?>
    <tr>
      <td><?php echo $value->first_name.' '.$value->last_name;; ?></td>
      <td><?php echo $value->email; ?></td>
      <td><?php echo '+265'.$value->phone_number; ?></td>
      <td><?php echo $value->location; ?></td>
      <td><?php echo $value->date_registered; ?></td>
    </tr>
    <?php }?>
  </tbody>
  
        <?php } ?>
<!-- END -->



</table>


<?php } else {?>
  <?php 
        if($_GET['tbl'] == 'products')
        {?>
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"></h1>
          <?php 
                if (isset($_SESSION['admin'])) {?>
                  <a href="<?php echo URL('add_product'); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                  class="fas fa-wrench fa-sm text-white-50"></i> Add Product</a>
                <?php }
          ?>
       </div>
        <?php } ?>

        <?php 
        if($_GET['tbl'] == 'invoice')
        {?>
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"></h1>
          <?php 
                if (isset($_SESSION['admin'])) {?>
                  <a href="<?php echo URL('create_invoice'); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                  class="fas fa-plus-circle fa-sm text-white-50"></i> Create Invoice</a>
                <?php }
          ?>
       </div>
        <?php } ?>

        <?php 
        if($_GET['tbl'] == 'sales')
        {?>
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"></h1>
          <?php 
                if (isset($_SESSION['admin'])) {?>
                  <a href="<?php echo URL('add_sale'); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                  class="fas fa-plus-circle fa-sm text-white-50"></i> Add Sale</a>
                <?php }
          ?>
       </div>
        <?php } ?>

<div class="p-5 shadow mb-4 bg-warning rounded text-center text-light rounded-3">
  <div class="container-fluid py-1">
    <h1 class="display-5 fw-bold" style="font-size:50px;">
    <i class="bi bi-exclamation-triangle-fill"></i>
    </h1>
    <p style="font-weight:500; font-size:20px;"><?php echo ucfirst($_GET['tbl']); ?> not found.</p>
    <!-- <button class="btn btn-primary btn-sm" type="button">Example button</button> -->
  </div>
</div>
<?php } ?>


<?php 
       
    if (isset($_GET['tbl']) == 'sales' && array_column($data, 'total_cost')) {?>

    <?php 
    $sum = [];

    foreach ($data as $value) {
    
      array_push($sum, $value->total_cost);
    
    } ?>

    <div class="flex">
    <div>TOTAL AMOUNT</div>
    <div><b><?php echo 'MK'.number_format(array_sum($sum), 2);?></b></div>
    </div>
    
    <?php } ?>


<?php include_file('templates/copyrights');?>
<?php include_file('templates/footer');?>