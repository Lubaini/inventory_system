<?php 


    if (isset($SYSTEM)) {

        if($SYSTEM['ENVIRONMENT'] == 'development'){

            ini_set('display_errors', TRUE);
            error_reporting(E_ALL);
    
        } elseif ($SYSTEM['ENVIRONMENT'] == 'production') {

            ini_set('display_errors', FALSE);
            error_reporting(E_ALL);
            ini_set('log_errors', TRUE);
            ini_set('error_log', 'system/error_logs.txt');

        } elseif ($SYSTEM['ENVIRONMENT'] == '') {

            error('SYSTEM: <b>UNKNOWN ENVIRONMENT</b>.');
        }

    } else {

        error('SYSTEM: <b>UNKNOWN ENVIRONMENT</b>.');
    }




