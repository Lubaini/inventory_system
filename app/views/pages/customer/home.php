<?php include_file('templates/enduserheader'); ?>
<?php include_file('templates/enduser_navbar'); ?>

<?php

// echo '<pre>',print_r($_SESSION['customer']),'</pre>';

?>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php include_file('img/lube.jpg'); ?>" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success">Meru Force 1 Oil.</h1>
                                <h3 class="h2">High Performance Promise.</h3>
                                <p>
                                    Performance Motor Oil. German Technology. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php include_file('img/banner_img_01.png'); ?>" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                            <h1 class="h1 text-success">Handigas</h1>
                                <h3 class="h2">On promo - Not Available to All Stations.</h3>
                                <p>Gas Cylinder 16KG</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php include_file('img/cook-top.png'); ?>" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Cooker Top</h1>
                                <h3 class="h2">Available at all stations.</h3>
                                <p>
                                Gas Cooker Top. Silver Appearance. Steel
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="bi bi-chevron-compact-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="bi bi-chevron-compact-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Products</h1>
                <p>These are the products we sale from our company.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="<?php echo URL('shop&stn='.$_SESSION['customer']->station);?>"><img src="<?php include_file('img/pic.png'); ?>" height="300px" class="img-fluid"></a>
                <h5 class="text-center mt-3 mb-3">16KG Gas Cylinder</h5>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="<?php echo URL('shop&stn='.$_SESSION['customer']->station);?>"><img src="<?php include_file('img/pic1.png'); ?>" height="300px" class="img-fluid"></a>
                <h2 class="h5 text-center mt-3 mb-3">9KG Gas Cylinder</h2>
                
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="<?php echo URL('shop&stn='.$_SESSION['customer']->station);?>"><img src="<?php include_file('img/pic3.png'); ?>" height="300px" class="img-fluid"></a>
                <h2 class="h5 text-center mt-3 mb-3">6KG Gas Cylinder </h2>
                
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Featured Products</h1>
                    <p class="bg-dark text-light rounded">Check out products we are offering to you at a fair price.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo URL('shop').'&stn='.$_SESSION['customer']->station;?>">
                            <img src="<?php include_file('img/4-plate-gas-stove.png'); ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-muted bi bi-star"></i>
                                    <i class="text-muted bi bi-star"></i>
                                </li>
                                <li class="text-muted text-right">MK494,570.00</li>
                            </ul>
                            <a href="<?php echo URL('shop').'&stn='.$_SESSION['customer']->station;?>" class="h2 text-decoration-none text-dark">4 Plate Gas Stove</a>
                            <p class="card-text">
                            MIDEA 4 PLATE GAS STOVE - BMG50-B · Black appearance · Stainless Steel Cook top · Enamel grates · 4 gas burner · Gas oven · Bottom gas burners only.
                            </p>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo URL('shop').'&stn='.$_SESSION['customer']->station;?>">
                            <img src="<?php include_file('img/cook-top.png'); ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-muted bi bi-star"></i>
                                    <i class="text-muted bi bi-star"></i>
                                </li>
                                <li class="text-muted text-right">MK48,000.00</li>
                            </ul>
                            <a href="<?php echo URL('shop').'&stn='.$_SESSION['customer']->station;?>" class="h2 text-decoration-none text-dark">Cooker Top</a>
                            <p class="card-text">
                                Gas Cooker Top. Silver Appearance. Steel.
                            </p>
                            <p class="text-muted">Reviews (48)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo URL('shop').'&stn='.$_SESSION['customer']->station;?>">
                            <img src="<?php include_file('img/gaspipe.png'); ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-warning bi bi-star"></i>
                                    <i class="text-warning bi bi-star"></i>
                                </li>
                                <li class="text-muted text-right">MK1,500.00</li>
                            </ul>
                            <a href="<?php echo URL('shop').'&stn='.$_SESSION['customer']->station;?>" class="h2 text-decoration-none text-dark">Gas Pipe</a>
                            <p class="card-text">
                                Steel. Copper. Brass or CSST(Corrugated Stainless Steel Tubing).
                            </p>
                            <p class="text-muted">Reviews (74)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->


        <?php include_file('templates/enduserfooter'); ?>