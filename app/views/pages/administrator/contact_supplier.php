<?php
session_start();

if(isset($_SESSION['admin']))
{
    $USER = $_SESSION['admin'];

} else {

    header('location:index.php?page=admin_login');

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
                <h1 class="h4 text-gray-900 mb-4">Contact Supplier</h1>
                <br>
            </div>
            
            <form class="user" method="POST" action="<?php echo URL('contact_supplier&value='.$_SESSION['admin']->station);?>">

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-user" value="<?php echo $_SESSION['admin']->first_name.' '.$_SESSION['admin']->last_name;?>" disabled>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['admin']->id;?>">
                        <input type="hidden" name="stn" value="<?php echo $_GET['value'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control form-control-user" id="description" name="msg" placeholder="List of products required to your station." required></textarea>
                </div>
                <button type="submit" name="contact" class="btn w-50 btn-primary btn-user btn-sm">
                    <i class="bi bi-plus-circle"></i>    
                    Add
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
    </script>
<?php }?>


<?php include_file('templates/footer');?>