<?php
session_start();
if(isset($_SESSION['admin']))
{
    $USER = $_SESSION['admin'];
} else {
    header('location:index.php?page=login');
}
include_file('templates/header');
include_file('pages/sidebar');
include_file('pages/topbar');

?>


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    
                        <a href="http://localhost/inventory_system/app/views/pages/generate_sales_report.html"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Sales Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

<!-- =================== STATION A==================================================== -->
                        <!-- AREA 25 -->
                        <div style="height: 150px;" class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <?php 
                                                      if ($_GET['stn'] == 'a') {?>
                                                        Area 25 (Profits)
                                                      <?php } else {?>
                                                      Area 49 (Profits)
                                                      <?php } ?>
                                        
                                            
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php format($data['profit_a'], 2);?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-arrow-right fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div style="height: 150px;" class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Revenue</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php format($data['revenue_a'][0]->revenue, 2);?></div>
                                        </div>
                                        <div class="col-auto">
                                            
                                            <i class="bi bi-credit-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Cylinder Card Example -->
                        <div style="height: 150px;" class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Products
                                                
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['station_a_products_num'][0]->results;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-droplet fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="height: 150px;" class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Sales
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['sales'][0]->results;?></span></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="height: 150px;" class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Invoices
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['invoice'][0]->results;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- =================== END STATION A==================================================== -->
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <!-- <div class="col-xl-8 col-lg-7"> -->
                            <!-- <div class="card shadow mb-4"> -->
                                <!-- Card Header - Dropdown -->
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Card Body -->
                                <!-- <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div> -->
                            <!-- </div> -->
                        <!-- </div> -->

                        <!-- Pie Chart -->
                        <!-- <div style="height: 150px;" class="col-xl-6 col-lg-5"> -->
                            <!-- <div class="card shadow mb-4"> -->
                                <!-- Card Header - Dropdown -->
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Card Body -->
                                <!-- <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>

     
<!-- WARNINGS CONCERNING GAS Level -->
<?php 
  
if($data['station_a_products_num'][0]->results < 5){?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Alert!',
            text: 'Products are less than 5 in the stock.'
        });
    </script>
<?php }?>




<?php 
  
if($data['station_a_products_num'][0]->results < 2){?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Alert',
            text: 'There are no products available in stock.'
        });
    </script>
<?php }?>


<?php include_file('templates/copyrights');?>
<?php include_file('templates/footer'); ?>