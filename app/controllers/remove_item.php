<?php if(isset($_GET["action"])){

    if($_GET["action"] == "delete"){

        foreach ($_SESSION["cart"] as $keys => $values) {

            if($values["id"] == $_GET["id"]){

                unset($_SESSION["cart"][$keys]);
                
                echo '<script>
                            Swal.fire({
                                icon: "info",
                                text: "Item successfully removed."
                            });
                      </script>';

                echo '<script type="text/javascript">

                            setTimeout(function()
                            {
                                window.location.assign("http://localhost/inventory_system/index.php?page=cart&stn=".$values["id"]);
                            }
                            ,1000);

                     </script>';
                
            }
        }
    }
}
?>