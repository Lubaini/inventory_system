<?php include_file('templates/header'); ?>
<?php include_file('templates/loader');?>
<?php

session_start();

if(isset($_SESSION['admin'])) {?>

    <script type="text/javascript">
         setTimeout(function()
         {
            window.location.assign("http://localhost/inventory_system/index.php?page=administrator_dashboard&stn=<?php echo $_SESSION['admin']->station;?>");
         }
         ,6000);
    </script>

<?php } ?>
<?php include_file('templates/footer'); ?>