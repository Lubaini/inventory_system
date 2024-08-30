<?php

require 'system/autoloader.php';

// GETTING THE PROJECT FOLDER NAME
define('ROOTDIR', basename(__DIR__), FALSE);

// LOADING ALL FILES REQUIRED TO RUN THE SYSTEM
startup_files();

$App = new Route\Page();

//Displaying pages requested 
$App->Route();