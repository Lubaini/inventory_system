
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                
            <?php 
                 if (isset($_SESSION['super_user'])) {?>

                    href="<?php echo URL('superuser&stn='.$_SESSION['super_user']->station);?>"

                 <?php } elseif (isset($_SESSION['admin'])) {?>

                    href="<?php echo URL('administrator_dashboard&stn='.$_SESSION['admin']->station);?>"

            <?php } ?> >
                <div class="sidebar-brand-icon rotate-n-15">
                <img class="sidebar-card-illustration mb-2" height="30px" width="30px" src="assets/img/2.png" alt="...">
                </div>
                
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
            <a class="nav-link"
            <?php 
                  if (isset($_SESSION['super_user'])) {?>
                    
                         href="<?php echo URL('superuser');?>"
                   
                  <?php } elseif (isset($_SESSION['admin'])) {?>
                        
                        href="<?php echo URL('administrator_dashboard&stn='.$_SESSION['admin']->station);?>">
                    
                  <?php } ?>
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <?php
                  if(isset($_SESSION['admin'])){?>
                  <div class="sidebar-heading">
                     Station <?php echo ucfirst($_SESSION['admin']->station);?>
                  </div>
                  <?php } ?>

            <?php
                  if (isset($_SESSION['super_user'])) {?>
                     <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo URL('messages');?>">
                    <i class="bi bi-chat-left-dots"></i>
                    <span>Messages</span>
            </a>    
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi fa-fw bi-geo-alt"></i>
                    <span>Area 25 Station</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu</h6>
                        <a class="collapse-item" href="<?php echo URL('records&value=a&tbl=products');?>">Products</a>
                        <a class="collapse-item" href="<?php echo URL('records&value=a&tbl=sales');?>">Sales</a>
                        <a class="collapse-item" href="<?php echo URL('records&value=a&tbl=invoice');?>">Invoices</a>
                        <a class="collapse-item" href="<?php echo URL('records&value=a&tbl=users');?>">Customers</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi fa-fw bi-geo-alt"></i>
                    <span>Area 49 Station</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu</h6>
                        <a class="collapse-item" href="<?php echo URL('records&value=b&tbl=products');?>">Products</a>
                        <a class="collapse-item" href="<?php echo URL('records&value=b&tbl=sales');?>">Sales</a>
                        <a class="collapse-item" href="<?php echo URL('records&value=b&tbl=invoice');?>">Invoices</a>
                        <a class="collapse-item" href="<?php echo URL('records&value=b&tbl=users');?>">Customers</a>
                    </div>
                </div>
            </li>
                  <?php } elseif (isset($_SESSION['admin'])) {?>
                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?php echo URL('contact_supplier&value='.strtolower($_SESSION['admin']->station));?>">
                            <i class="bi fa-fw bi-telephone"></i>
                            <span>Contact Supplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?php echo URL('view_products&value='.strtolower($_SESSION['admin']->station).'&tbl=products');?>">
                            <i class="bi fa-fw bi-droplet"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" id="link" href="<?php echo URL('view_sales&value='.strtolower($_SESSION['admin']->station));?>">
                            <i class="bi fa-fw bi-file-earmark"></i>
                            <span>Sales</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?php echo URL('view_invoices&value='.strtolower($_SESSION['admin']->station));?>">
                            <i class="bi fa-fw bi-file-earmark"></i>
                            <span>Invoice</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?php echo URL('view_users&value='.strtolower($_SESSION['admin']->station));?>">
                            <i class="bi fa-fw bi-people"></i>
                            <span>Customers</span>
                        </a>
                    </li>
                  <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                SYSTEM
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php 
                  if (isset($_SESSION['admin'])) {?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?php echo $_SERVER['REQUEST_URI'].'&logout&admin=1';?>">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>Login Out</span>
                        </a>
                    </li>
                  <?php } else {?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?php echo $_SERVER['REQUEST_URI'].'&logout';?>">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>Login Out</span>
                        </a>
                    </li>
                  <?php } ?>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="assets/img/2.png" alt="...">
                <?php
                      if (isset($_SESSION['super_user'])) {?>
                        <p class="text-center mb-2"><strong>Lilongwe Branches</strong> System Monitor.</p>
                      <?php } elseif (isset($_SESSION['admin'])) {?>
                        <?php if ($_SESSION['admin']->station == 'a') {?>

                            <p class="text-center mb-2"><strong>Area 25</strong> Gas Station.</p>

                        <?php } elseif($_SESSION['admin']->station == 'b') {?>
                            
                            <p class="text-center mb-2"><strong>Area 49</strong> Gas Station.</p>
                            
                        <?php } ?>
                      <?php }
                ?>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">