<?php

if (isset($_POST["add_to_cart"])) {
if(isset($_SESSION['cart'])){
  
$item_array_id=array_column($_SESSION["cart"], "id");
if(!in_array($_POST["p_id"], $item_array_id))
{
$count=count($_SESSION['cart']);
  $item_array=array(

    
    'id'   => $_POST['p_id'],
    'img'  => $_POST['img'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'category' => $_POST['category'],
    'snum' => $_POST['snum'],
    'dsp' => $_POST['dsp'],
    'kg'  => $_POST['kg'],
    'qty' => $_POST['qty'],
    'stn' => $_POST['stn'],
    'quantity' => $_POST['quantity']

  );
   $_SESSION['cart'][$count]=$item_array;
   
  echo '<script>
          Swal.fire({
              icon: "info",
              text: "Item Added To Cart."
          });
        </script>';

  
   
}
else{
    
  echo '<script>
            Swal.fire({
                icon: "info",
                text: "Product already added to the cart."
            });
        </script>';
}
 
}

else{
  $item_array=array(

    
    
    'id'   => $_POST['p_id'],
    'img'  => $_POST['img'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'category' => $_POST['category'],
    'snum' => $_POST['snum'],
    'dsp' => $_POST['dsp'],
    'kg'  => $_POST['kg'],
    'qty' => $_POST['qty'],
    'stn' => $_POST['stn'],
    'quantity' => $_POST['quantity']

  );

  //storing details above into $_SESSION['cart']
  $_SESSION['cart'][0]=$item_array;
}
//@array_push($_SESSION['cart']);
  
}
?>