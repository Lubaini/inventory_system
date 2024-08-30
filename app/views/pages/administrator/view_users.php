<?php
session_start();
include_file('templates/header');
include_file('pages/sidebar');
include_file('pages/topbar'); 

?>
<style>
  .flex {
    display: flex;
    justify-content:end;
    padding: 5px;
    gap: 1rem;
  }
</style>

<?php if(!empty($data)) { ?>
  <h1 class="h3 mb-2 text-gray-800">
  <?php
    if ($_GET['value'] == 'a') { ?>

    <span>Area 25 Gas Station</span>
    <?php $branch = 'Area 25'; ?>

      <?php }elseif($_GET['value'] == 'b'){?>

        <span>Area 18 Gas Station</span>
        <?php $branch = 'Area 18'; ?>

        <?php } ?>
</h1>
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<p class="mb-4"><?php echo $branch; ?> Customers.</p>
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>

<table style="font-size:12px;" class="table shadow table-bordered">
  <div style="color:#4e73df; font-weight: 500;" class="bg-primary text-light border card-header p-3">
      <span>Customers List</span>
  </div>

<!-- SHOWS PRODUCTS RESULTS -->
  <!-- SHOWS SALES RESULTS -->
        <thead>
    <tr>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Customer</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Email</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Phone Number</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Location</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Station</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Date Registered</span>
        </div>
      </th>
      <th scope="col">
        <div class="d-flex justify-content-between">
          <span>Action</span>
        </div>
      </th>
  </thead>
  <tbody>
    
    <?php foreach ($data as $value) {?>
    <tr>
      <td><?php echo ucfirst($value->first_name).' '.ucfirst($value->last_name); ?></td>
      <td><?php echo $value->email; ?></td>
      <td><?php echo '+265'.$value->phone_number; ?></td>
      <td><?php echo $value->location; ?></td>
      <td><?php echo ucfirst($value->station); ?></td>
      <td><?php echo $value->date_registered; ?></td>
      <td>
      <a href="<?php echo URL('view_users&value='.$_SESSION['admin']->station.'&tbl=users&action=delete&id='.$value->id); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
              <i class="fas fa-trash fa-sm text-white-50"></i> 
              Remove
          </a>
      </td>
    </tr>
    <?php }?>
    
  </tbody>
  
<!-- END -->
</table>




<?php } else {?>

  

  <div class="p-5 shadow mb-4 bg-info rounded text-center text-light rounded-3">
  <div class="container-fluid py-1">
    <h1 class="display-5 fw-bold" style="font-size:50px;">
    <i class="bi bi-exclamation-triangle-fill"></i>
    </h1>
    <p style="font-weight:500; font-size:20px;">No results found !</p>
    <!-- <button class="btn btn-primary btn-sm" type="button">Example button</button> -->
  </div>
</div>

<?php } ?>