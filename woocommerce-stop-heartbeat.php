<?php


//theme functions

add_action( 'init', 'stop_heartbeat', 1 );
function stop_heartbeat() {
wp_deregister_script('heartbeat');
}

add_action( 'wp_print_scripts', 'de_script', 100 );
function de_script() {
wp_dequeue_script( 'wc-cart-fragments' );

return true;
}

?>
