<?php
session_start();
if(isset($_SESSION['super_user']))
{
    $USER = $_SESSION['super_user'];
} else {
    header('location:index.php?page=login');
}


include_file('templates/header');
include_file('pages/sidebar');
include_file('pages/topbar');

?>

<a class="text-decoration-none font-weight-bold" href="<?php echo URL('messages');?>">
    
<div class="alert alert-danger d-flex align-items-center" role="alert">
  <div>
    You have (<?php echo $data['messages'][0]->num;?>) products requests.
  </div>
</div>
</a>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="http://localhost/inventory_system/app/views/pages/generate_sales_report.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Sales Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- =================== STATION A==================================================== -->
    <!-- AREA 25 -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Area 25 (Profits)


                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php format($data['profit_a'], 2); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-arrow-right fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Revenue</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php format($data['revenue_a'][0]->revenue, 2); ?></div>
                    </div>
                    <div class="col-auto">

                        <i class="bi bi-credit-card fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Cylinder Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Products

                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                                   if (gettype($data['station_a_products_num'][0]->results) == 'NULL') {
                                        echo 0;
                                   } else {
                                    echo $data['station_a_products_num'][0]->results;
                                   }
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-droplet fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================== END STATION A==================================================== -->

    <!-- =================== STATION B==================================================== -->
    <!-- Area 18 (Profits) -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Area 49 (Profits)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php format($data['profit_b'], 2); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-arrow-right fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Revenue</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php format($data['revenue_b'][0]->revenue, 2); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-credit-card fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Products Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Products</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php 
                                   if (gettype($data['station_b_products_num'][0]->results) == 'NULL') {
                                        echo 0;
                                   } else {
                                    echo $data['station_b_products_num'][0]->results;
                                   }
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-droplet fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =================== END STATION B==================================================== -->
</div>

<!-- Content Row -->

<div class="row">

</div>


<!-- WARNINGS CONCERNING GAS Level -->
<?php 
    if(isset($data['items'])){?>
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Products Alert',
                text: 'Following item(s) <?php echo $data['items'];?> are running low in the stock .'
            });
        </script>
<?php }?>


<?php include_file('templates/copyrights'); ?>
<?php include_file('templates/footer'); ?>