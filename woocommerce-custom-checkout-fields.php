<?php


/**
 * Add the field to the checkout
 * https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
 */
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {

    echo '<div id="my_custom_checkout_field">';

    woocommerce_form_field( 'student_names', array(
        'type'          => 'textarea',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('<strong>Student Names</strong>'),
        'placeholder'   => __('Enter the names of all students and include their age if they are under 18.'),
        'required'  => false,
        ), $checkout->get_value( 'student_names' ));

    echo '</div>';

}

/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['student_names'] )
        wc_add_notice( __( 'Please enter the names and their age if they are under 18.' ), 'error' );
}


/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['student_names'] ) ) {
        update_post_meta( $order_id, 'Student Names', sanitize_text_field( $_POST['student_names'] ) );
    }
}


/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Student Names').':</strong> ' . get_post_meta( $order->id, 'Student Names', true ) . '</p>';
}




?>
