<?php

/**
* Manipulate default state and countries
*
* As always, code goes in your theme functions.php file
*/
add_filter( 'default_checkout_country', 'change_default_checkout_country' );
add_filter( 'default_checkout_state', 'change_default_checkout_state' );
function change_default_checkout_country() {
return 'XX'; // country code
}
function change_default_checkout_state() {
return 'XX'; // state code
}



?>