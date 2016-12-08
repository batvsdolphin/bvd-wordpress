<?php

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
