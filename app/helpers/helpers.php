<?php 

const APP   = 'app/';
const VIEWS = 'app/views/';
const TEMPS = 'app/views/templates/';

// include a file
function include_file($filename, $output = null, $output2 = null)
{
     if (file_exists(VIEWS.$filename.'.php')) {
        return require VIEWS.$filename.'.php';

     } elseif (file_exists(APP.$filename.'.php')) {
        return require APP.$filename.'.php';

     } elseif(file_exists('assets/'.$filename)) {
        echo 'assets/'.$filename;

     } else {

       error('Failed to locate file location');
        
     }
}

function generate_serial_number()
{
   return 'PSN'.rand(14, 1115).'MMGPS'.rand(0, 9);
}

function format($float, $decimal)
{
   echo 'MK'.number_format($float, $decimal);
}

function error($msg)
{
        exit(require VIEWS.'errors/error.php');
}

#-----------SECURITY
function encode($value)
{
   return strtr(base64_encode($value), '+/=', '-_,');
}

function decode($value)
{
   return base64_decode(strtr($value, '-_,', '+/='));;
}

function URL($page) {   
     
   return 'http://'.$_SERVER['HTTP_HOST'].'/'.ROOTDIR.'/'.'index.php?page='.$page;    
}