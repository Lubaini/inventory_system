<?php include_file('templates/enduserheader'); ?>
<?php include_file('templates/enduser_navbar'); ?>
<?php include_file('controllers/shopping_cart'); ?>


<div class="container py-5">
        <div class="row">
        <div class="col-lg-9">
            <?php
                  if (!empty($data)) {?>
                    <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="javascript:void(0)">Products Available</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
                <div class="row">
                <?php 
                        foreach ($data['items'] as $item) {?>
                    <div class="col-md-4">
                        <form method="post" action="<?php echo URL('shop').'&stn='.$_SESSION['customer']->station;?>">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?php include_file('img/'.$item->image); ?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none"><?php echo $item->name; ?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <p class="text-center mb-0"><?php echo 'MK'.number_format($item->price, 2); ?></p>
                                    <?php 
                                      if (!$item->kg == 0) {?>
                                    <p class="text-center mb-0"><?php echo $item->kg.'KG'; ?></p>
                                    <?php }?>
                                </ul>
                                <?php 
                                      if (!$item->kg == 0) {?>
                                        
                                        <label for="pet-select">Select category type:</label>

                                        <select class="form-control" name="category">
                                            <option value="new">--Please choose an option--</option>
                                            <option value="new">New</option>
                                            <option value="refill">Refill</option>
                                        </select>

                                <?php } else {?>
                                    
                                    <input type="hidden" name="category" value="new">
                                    <?php }?>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning bi bi-star"></i>
                                        <i class="text-warning bi bi-star"></i>
                                        <i class="text-warning bi bi-star"></i>
                                        <i class="text-warning bi bi-star"></i>
                                        <i class="text-warning bi bi-star"></i>
                                    </li>
                                </ul>

                                <input type="hidden" name="p_id" value="<?php echo $item->id; ?>">
                                <input type="hidden" name="img" value="<?php echo $item->image; ?>">
                                <input type="hidden" name="name" value="<?php echo $item->name; ?>">
                                <input type="hidden" name="price" value="<?php echo $item->price; ?>">
                                <input type="hidden" name="dsp" value="<?php echo $item->description; ?>">
                                <input type="hidden" name="kg" value="<?php echo $item->kg; ?>">
                                <input type="hidden" name="snum" value="<?php echo $item->snum; ?>">
                                <input type="hidden" name="qty" value="<?php echo $item->quantity; ?>">
                                <input type="hidden" name="stn" value="<?php echo $item->station; ?>">
                                <input type="number" style="width: 100%;" name="quantity" placeholder="Quantity (Limit: <?php echo $item->quantity;?>)" min="1" max="<?php echo $item->quantity;?>" required>
                                
                                

                                <?php 
                                      if ($item->quantity == 0) {?>
                                        
                                      <?php } else {?>
                                        <div class="col text-center mt-2">
                                            <button type="submit" name="add_to_cart" class="btn btn-success btn-sm px-3">Add To Cart</button>
                                        </div>         
                                      <?php } ?>
                            </div>
                        </div>
                        </form>
                    </div>
                         <?php }    
                ?>
                </div>
                <div div="row">
                    <!-- <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul> -->
                </div>
                  <?php } else {?>
                    <br><br>
                    <div class="container-fluid bg-light py-5">
                        <div class="col-md-6 m-auto text-center">
                            <h2 class="">We apologize sincere!</h2>
                            <hr>
                            <p>
                               There are no products available in stock.
                            </p>
                        </div>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br><br>
                  <?php }
            ?>
            </div>

       

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Supported payments methods</h1>
                <ul class="list-unstyled templatemo-accordion">
                
                    <li class="pb-3">
                    <img style="height: 130px; width:150px;" class="card-img rounded-0 img-fluid" src="<?php include_file('img/atm.png'); ?>">
                    </li>
                    <li class="pb-3">
                    <img style="height: 130px; width:150px;" class="card-img rounded-0 img-fluid" src="<?php include_file('img/tnm.png'); ?>">
                    </li>
                    <li class="pb-3">
                    <img style="height: 130px; width:150px;" class="card-img rounded-0 img-fluid" src="<?php include_file('img/NBM.jpg'); ?>">
                    </li>
                </ul>
            </div>

        </div>
    </div>
<script type="text/javascript">
 setTimeout(function(){
    window.location.reload();
 }, 15000);       
</script>
    <?php include_file('templates/enduserfooter'); ?>