<?php

/*
Plugin Name: AC_Assessment3
Plugin URI: https://valedigital.co.nz
Description: Assessment 3 - Web Application
Version: 1.0
Author URI: https://valedigital.co.nz
Author: Andre Campos
Text Domain: ac_assessment
*/ 

//Shortcode
include ABSPATH . 'wp-content/plugins/assessment3/shortcode/login.php';
include ABSPATH . 'wp-content/plugins/assessment3/shortcode/newlist.php';
include ABSPATH . 'wp-content/plugins/assessment3/shortcode/newitem.php';
include ABSPATH . 'wp-content/plugins/assessment3/shortcode/displaylist.php';
include ABSPATH . 'wp-content/plugins/assessment3/shortcode/displayitem.php';

// API
include ABSPATH . 'wp-content/plugins/assessment3/API/endpoint.php';

include ABSPATH . 'wp-content/plugins/assessment3/API/getlist.php';
include ABSPATH . 'wp-content/plugins/assessment3/API/createlist.php';
include ABSPATH . 'wp-content/plugins/assessment3/API/deletelist.php';

include ABSPATH . 'wp-content/plugins/assessment3/API/getitem.php';
include ABSPATH . 'wp-content/plugins/assessment3/API/createitem.php';
include ABSPATH . 'wp-content/plugins/assessment3/API/deleteitem.php';


?>