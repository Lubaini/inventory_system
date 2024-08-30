<?php
session_start();
include_file('templates/header');
include_file('pages/sidebar');
include_file('pages/topbar'); 
?>
<h1 class="h3 mb-2 text-gray-800">
  <?php
    if ($_GET['value'] == 'a') { ?>
    <span>Area 25 Gas Station</span>
      <?php } ?>
</h1>
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<p class="mb-4">Available products in the stock to this station.</p>
    <h1 class="h3 mb-0 text-gray-800"></h1>
    <?php 
        if (isset($_SESSION['admin'])) {?>
            <a href="<?php echo URL('add_product'); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-wrench fa-sm text-white-50"></i> Add Product</a>
    <?php }?>
</div>

<table  style="font-size:12px;" class="table shadow table-bordered">
  <div style="color:#4e73df; font-weight: 500;" class="border card-header p-3">
      <span>Products Available</span>
  </div>

  <!-- SHOWS PRODUCTS RESULTS -->
<thead>
    <tr>

      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Serial Number</span>
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
          <span>KG's</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Station</span>
          <i class="bi bi-sort-alpha-down"></i>
        </div>
      </th>

      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Edit</span>
          <i class="bi bi-gear"></i>
        </div>
      </th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $item) {?>
    <tr>
      <td><?php echo $item->snum; ?></td>
      <td><?php echo $item->name; ?></td>
      <td><?php echo $item->description; ?></td>
      <td><?php echo 'MK'.number_format($item->price, 2); ?></td>
      <td><?php echo $item->quantity; ?></td>
      <td><?php echo $item->kg; ?></td>
      <td><?php echo ucfirst($item->station); ?></td>

        <td>
          <a href="<?php echo URL('edit_product&id='.$item->id); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
              <i class="fas fa-wrench fa-sm text-white-50"></i> 
              Edit
          </a>
          <a href="<?php echo URL('view_products&value='.strtolower($_SESSION['admin']->station).'&tbl=products&action=delete&id='.$item->id); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i> 
              Remove
          </a>
      </td>
    </tr>
    <?php }?>
  </tbody>
  
<!-- END -->
</table>