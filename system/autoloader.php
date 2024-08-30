<?php 

function startup_files() {

    require 'app/helpers/helpers.php';
    require 'system/configurations.php';
    require 'system/system_checker.php';
}

spl_autoload_register(function($class) {
    
    if (!file_exists(APP.$class.'.php')) {

        error('Couldn\'t load class. '.$class);

    } else {

        include_once APP.$class.'.php';
    }  
});

