<?php


function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');

require_once(get_template_directory() . "/endpoints/phase-1.php");
require_once(get_template_directory() . "/endpoints/phase-2.php");
require_once(get_template_directory() . "/endpoints/phase-3.php");
require_once(get_template_directory() . "/endpoints/phase-4.php");
require_once(get_template_directory() . "/endpoints/phase-5.php");
require_once(get_template_directory() . "/endpoints/phase-6.php");

/*
* FUNCTIONS
*/

function include_function_files()
{
    locate_template( array( 'functions/wp_adjustments.php' ), true, true );
    locate_template( array( 'functions/returns.php' ), true, true );
}
add_action( 'after_setup_theme', 'include_function_files' );


?>
