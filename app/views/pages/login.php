<?php include_file('templates/header'); ?>
<body class="bg-gradient-primary">

 
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                    <img height="50px" width="50px" class="sidebar-card-illustration mb-2" src="assets/img/2.png" alt="...">
                                        <div class=" mb-4">
                                        <h1 class="h4 text-gray-900">Welcome Back!</h1>
                                        <small class="text-danger" style="margin-left: 6%; font-weight: 500;"><?php echo $data['error'] ?? '';?></small>
                                        </div>
                                    </div>
                                    <form action="<?php echo URL('login');?>" method="post" class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" 
                                            <?php
                                                  if (!empty($data)) {?>
                                                    value="<?php echo $data['post_email'];?>"
                                                  <?php } ?> placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                                        </div>
                                        
                                        
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                          
                                        Login
                                        </button>
                                        <hr>
                    
                                    </form>
      
                                    <div class="text-center">
                                        <a class="small" href="<?php echo URL('reset');?>">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo URL('register');?>">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php 
    // Wrong email or password   
if(isset($data['error'])){?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Wrong Email or Password'
        });
    </script>
<?php }?>

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






    <!-- <script>
        setTimeout(function(){
   window.location.reload();
}, 5000);
    </script> -->
    <?php include_file('templates/footer'); ?>