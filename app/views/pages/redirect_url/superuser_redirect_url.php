<?php include_file('templates/header'); ?>
<?php include_file('templates/loader');?>
<?php

session_start();

if(isset($_SESSION['super_user'])) {?>

    <script type="text/javascript">
        setTimeout(function()
        {
            window.location.assign("http://localhost/inventory_system/index.php?page=superuser");
        }
        ,9000);
    </script>

<?php } ?>
<?php include_file('templates/footer'); ?>