
<style>
.form {
  background-color: #08d;
  border-radius: 20px;
  box-sizing: border-box;
  height: 500px;
  padding: 20px;
  width: 420px;
}

.title {
  color: #eee;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
}

.subtitle {
  color: #eee;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
}

.input-container {
  height: 50px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 40px;
}

.ic2 {
  margin-top: 30px;
}

.input {
  background-color: #fff;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  /* color: #eee; */
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}

.cut {
  background-color: #08d;
  border-radius: 10px;
  height: 20px;
  left: 20px;
  position: absolute;
  top: -20px;
  transform: translateY(0);
  transition: transform 200ms;
  width: 76px;
}

.cut-short {
  width: 50px;
}

.input:focus ~ .cut,
.input:not(:placeholder-shown) ~ .cut {
  transform: translateY(8px);
}

.placeholder {
  /* color: #000; */
  font-family: sans-serif;
  left: 20px;
  line-height: 14px;
  pointer-events: none;
  position: absolute;
  transform-origin: 0 50%;
  transition: transform 200ms, color 200ms;
  top: 20px;
}

.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}

/* .input:not(:placeholder-shown) ~ .placeholder {
  color: #808097;
} */

.submit {
  /* background-color: #08d; */
  background-color: #15172b;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 38px;
  outline: 0;
  text-align: center;
  width: 100%;
}

.submit:active {
  background-color: #06b;
}

</style>

<!DOCTYPE html>
<html>
<head>
<title>Meru Group - Super User Login</title>
<link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">    
<script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
<!-- <link rel="stylesheet" href="assets/css/form.css"> -->
</head>
<body>
<!-- Loader 3 -->
    <!-- <div class="loader">
      <span></span>
      <span></span>
      <span></span>
    </div> -->


<section class="contents" style="display:flex; justify-content:center; margin-top: 50px;;">

<div class="form">
      <form action="<?php echo URL('admin_login');?>" method="post">
      
      <div style="display: flex; justify-content:center;" class="title">LOGIN <img height="50px" width="50px" src="assets/img/2.png" alt="...">
      </div>
      <hr>
        <div style="display: flex; justify-content:center;text-transform:uppercase;" class="subtitle">Welcome to Administrator System</div>
      <div class="input-container ic2">
        <input id="email" name="email" autocomplete="on" class="input required type="email" <?php
                                                  if (!empty($data)) {?>
                                                    value="<?php echo $data['post_email'];?>"
                                                  <?php } ?> placeholder=" "/>
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Email</>
      </div>
      <div class="input-container ic2">
        <input id="password" class="input" required name="password" type="password" placeholder=" " />
        <span 
        <?php 
              if (isset($data['password'])) {?>
                style="background-color:crimson; color: #fff; border-radius:6px; padding:5px;"
              <?php } else {?>
                style="display:none;"
              <?php }
        ?>>
        <?php echo $data['password'] ?? '';?></span>
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Password</label>
      </div>
      <button type="submit" name="login" class="submit">Login</button>
      </form>
<div style="color:#fff;">
<p>
  Meru Mount Group System Monitor. 
  <!-- <a style="text-decoration: none;" href="<?php echo URL('register');?>">Sign Up</a> -->
</p>

</div>
</div>


</section>

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

<script>
const loader = document.querySelector('.loader');
const contents = document.querySelector('.contents');

function init() {
  setTimeout(() => {
    loader.style.opacity = 0;
    loader.style.display = 'none';

    contents.style.display = 'block';
    setTimeout(() => (contents.style.opacity = 1), 50);
  }, 4000);
}

init();
</script>
<!-- <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script> -->
</body>
</html>
