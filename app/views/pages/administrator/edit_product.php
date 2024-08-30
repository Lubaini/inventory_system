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


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="<?php echo URL('administrator_dashboard&stn='.$_SESSION['admin']->station); ?>"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="bi bi-arrow-left-circle"></i> Back
    </a>
</div>

<div class="row">
    <div class="col-lg-12 d-none d-lg-block bg-register-image"></div>
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit Product</h1>
                
                <br>
            </div>
            
            <form class="user" method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>">
                
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="pname" name="pname" value="<?php echo $data[0]->name;?>" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="price" name="price" value="<?php echo $data[0]->price;?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="number" class="form-control form-control-user" id="kg" name="kg" value="<?php echo $data[0]->kg;?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control form-control-user" id="qty" name="qty" value="<?php echo $data[0]->quantity;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="img" name="img" value="<?php echo $data[0]->image;?>" required>
                        <small class="text-warning mx-3"><b>Example:</b> gas_cooker.jpg</small>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $USER->station;?>" disabled>
                        <input type="hidden" name="station" value="<?php echo $USER->station;?>">
                        <input type="hidden" name="id" value="<?php echo $data[0]->id;?>">
                        <small class="text-warning mx-3"><b>NOTE:</b> Product station</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-user" value="<?php echo $data[0]->snum;?>" disabled>
                        <input type="hidden" name="snum" value="<?php echo $data[0]->snum;?>">
                        <small class="text-warning mx-3"><b>NOTE:</b> SERIAL NUMBER CANNOT BE EDITED</small>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" style="height:95px;" class="form-control form-control-user" id="description" name="description" value="<?php echo $data[0]->description;?>" required>
                </div>
                <button type="submit" name="editProduct" class="btn w-50 btn-primary btn-user btn-sm">
                    <i class="bi bi-plus-circle"></i>    
                    Edit
                </button>
                
            </form>
            <hr>
        </div>
    </div>
</div>



<?php 
    
if(isset($data['alert'])){?>
    
    <script>
        Swal.fire({
            icon: '<?php echo $data['icon'];?>',
            title: '<?php echo $data['title'];?>',
            text: '<?php echo $data['alert'];?>'
        });

        setTimeout(function()
        {
            window.location.assign("http://localhost/inventory_system/index.php?page=<?php echo $_GET['page'].'&id='.$_GET['id'];?>");
        }
        ,3500);

    </script>

<?php }?>


<?php include_file('templates/footer');?>