<?php


//Hide products that are packages or subscription which belong to a page or has its own page by adding this into your functions.php:


add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
function custom_pre_get_posts_query( $q ) {
if ( ! $q->is_main_query() ) return;
if ( ! $q->is_post_type_archive() ) return;
if ( ! is_admin() ) {
$q->set( 'tax_query', array(array(
'taxonomy' => 'product_cat',
'field' => 'slug',
'terms' => array( 'PUT YOUR CATEGORY HERE' ), // Don't display products in the membership category on the shop page . For multiple category , separate it with comma.
'operator' => 'NOT IN'
)));
}
remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
}
?>
