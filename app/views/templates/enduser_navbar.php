 
 <!-- Start Top Nav -->
 <nav class="navbar navbar-expand-lg p-3 bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
            <div class="container text-light">
                <div class="w-100 d-flex justify-content-between">
                <div>
                    
                    <a class="navbar-sm-brand text-light text-decoration-none" href="E: info@mountmerugroup.com">
                    <i class="bi bi-person-circle mx-2"></i><?php echo 'Hi, '.$_SESSION['customer']->first_name.' '.$_SESSION['customer']->last_name; ?>
                    </a>
                    <!-- <a class="nav-link text-light" href="<?php echo $_SERVER['REQUEST_URI'].'&logout';?>"><i class="bi bi-book"></i> Logout</a> -->
                </div>
                <div>
                <i class="bi bi-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="E: info@mountmerugroup.com">E: info@mountmerugroup.com</a>
                    <i class="bi bi-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="+265 993 367 685">+265 993 367 685</a>
                    <a class="text-light" href="#" rel="sponsored"><i class="bi bi-facebook fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="#"><i class="bi bi-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="#"><i class="bi bi-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="#"><i class="bi bi-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="<?php echo URL('enduser'); ?>">
            <img height="45px" width="45px" class="sidebar-card-illustration mb-2" src="assets/img/2.png" alt="...">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL('enduser_home');?>"><i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL('about');?>"><i class="bi bi-info-circle"></i> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL('shop').'&stn='.$_SESSION['customer']->station;?>"><i class="bi bi-cart"></i> Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL('contact');?>"><i class="bi bi-telephone"></i> Contact</a>
                        </li>
                        <li class="bg-info rounded nav-item">
                            <a class="nav-link text-light" href="<?php echo URL('customer_invoice').'&id='.$_SESSION['customer']->id.'&stn='.$_SESSION['customer']->station;?>"><i class="bi bi-book"></i> View Invoices</a>
                        </li>
                        
                        
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                    </div>
                    <!-- <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="bi fa-fw bi-search text-dark mr-2"></i>
                    </a> -->
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo URL('cart');?>">
                        <i class="bi fa-fw bi-bag text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-danger text-light"><?php echo count($_SESSION['cart']);?></span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo $_SERVER['REQUEST_URI'].'&logout';?>">
                        <i class="bi fa-fw bi-box-arrow-left text-dark mr-1"></i> Log Out
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
 <!-- Modal -->
 <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div> 