<?php
session_start();
?>
<?php include_file('templates/header');?>
<?php include_file('pages/sidebar'); ?>
<?php include_file('pages/topbar'); ?>

<?php 
      if (!empty($data)) {?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Products Requests!</strong> You should check messages below.
  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
</div>

<div class="row">
  <?php 
        foreach ($data as $value) {?>
            <div class="col-sm-6 mb-3">
    <div class="card text-center">
    <div class="alert alert-success card-header">
        <?php if ($value->station == 'a') {?>
            <small>Area 25 Gas Station</small>
        <?php } elseif($value->station == 'b'){?>
            <small>Area 49 Gas Station</small>
        <?php } ?>
    </div>
        <div class="alert alert-primary card-body">
            <h6 class="card-title">Message</h6>
            <p class="card-text"><?php echo $value->message;?></p>
            <a href="<?php echo URL('messages&id='.$value->id); ?>" class="btn btn-sm btn-danger">Delete</a>
        </div>
        <div class="card-footer text-muted">
        <small><?php echo $value->date;?></small>
        </div>
    </div>
</div>
        <?php } ?>
</div>

      <?php } else { ?>
        <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">No message found!</h4>
  <hr>
  <p><em>Please try to check later</em>...</p>
</div>      
      <?php } ?>

<?php include_file('templates/copyrights');?>
<?php include_file('templates/footer');?>
