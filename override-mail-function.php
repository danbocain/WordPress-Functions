<?php

//add to functions.php to force from name and emails

add_filter( 'wp_mail_from', 'your_email' );
function your_email( $original_email_address )
{
	return 'your@email-address.com';
}


add_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );
function custom_wp_mail_from_name( $original_email_from )
{
	return 'Your sites name';
}

?>
