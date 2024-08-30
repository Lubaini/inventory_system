<!DOCTYPE html>
<html lang="en">
<?php


// if (!isset($_SESSION['super_user'])) {

//     header('location:index.php?page=login');
// }

if(isset($_GET['logout']) && $_GET['admin'] == 1)
{	
		sleep(2);
        unset($_SESSION['admin']);
		header('location:index.php?page=admin_login');

} elseif(isset($_GET['logout'])) {
    
		sleep(2);
		unset($_SESSION['super_user']);
		header('location:index.php?page=login');
}

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Meru Mount - GAS</title>
    

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">