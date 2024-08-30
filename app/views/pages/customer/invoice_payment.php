<?php include_file('templates/enduserheader');
?>
    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Payment Methods</h1>
                <p>Select your favorite payment method</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <div class="p-2 border">
                <a href="<?php echo URL('pay_invoice&code='.$_GET['coded'].'&pm=atm&id='.$_GET['id']);?>">
                <img src="<?php include_file('img/atm.png'); ?>" style="height: 150px;" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <div class="p-2 border">
                <a href="<?php echo URL('pay_invoice&code='.$_GET['coded'].'&pm=tnm&id='.$_GET['id']);?>">
                <img src="<?php include_file('img/tnm.png');?>" style="height: 150px;" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <div class="p-2 border">
                <a href="<?php echo URL('pay_invoice&code='.$_GET['coded'].'&pm=nbm&id='.$_GET['id']);?>">
                <img src="<?php include_file('img/NBM.jpg'); ?>" height="300px" class="img-fluid"></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->
