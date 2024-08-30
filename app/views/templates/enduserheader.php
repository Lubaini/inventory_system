<?php session_start();?>

<?php 

if(isset($_GET['logout']))
{	
		sleep(2);
        unset($_SESSION['customer']);
		unset($_SESSION['cart']);
		header('location:index.php?page=enduser');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Meru Mount - GAS</title>
    
    <link rel="apple-touch-icon" href="assets/img/user_interface/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/user_interface/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/user_interface/templatemo.css">
    <link rel="stylesheet" href="assets/css/user_interface/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/user_interface/fontawesome.min.css">

    <!-- NEW------------ -->

    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>
