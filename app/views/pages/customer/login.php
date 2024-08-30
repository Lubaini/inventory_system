<style>
body {
  align-items: center;
  background-color: #EBECF0;
  display: flex;
  justify-content: center;
  height: 100vh;
}

.form {
  background-color: #15172b;
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
  background-color: #303245;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}

.cut {
  background-color: #15172b;
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
  color: #65657b;
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

.input:not(:placeholder-shown) ~ .placeholder {
  color: #808097;
}

.input:focus ~ .placeholder {
  color: #dc2f55;
}

.submit {
  background-color: #08d;
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

    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">




<div class="form">
      <form action="<?php echo URL('enduser');?>" method="post">
      <div style="display: flex; justify-content:center;" class="title">LOGIN <img height="50px" width="50px" src="assets/img/2.png" alt="...">
        </div>
          <hr>
      <div style="display: flex; justify-content:center;" class="subtitle">Welcome To Meru Mount Online Shop</div>
      <div class="input-container ic2">
        <input id="email" name="email" class="input" required type="email" <?php
                                                  if (!empty($data)) {?>
                                                    value="<?php echo $data['post_email'];?>"
                                                  <?php } ?> placeholder=" "/>
        <div class="cut cut-short"></div>
        <label for="email" class="placeholder">Email</>
      </div>
      <div class="input-container ic2">
        <input id="password" class="input" required name="password" type="password" placeholder=" " />
        <div class="cut"></div>
        <label for="lastname" class="placeholder">Password</label>
      </div>
      <button type="submit" name="login" class="submit">Login</button>
      </form>
<div style="color:#fff;">
<p>
  Don't have an account? <a style="text-decoration: none;" href="<?php echo URL('register');?>">Sign Up</a>
</p>

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
