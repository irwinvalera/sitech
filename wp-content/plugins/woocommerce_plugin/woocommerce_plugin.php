<?php
/*
Plugin Name: WooCommerce Additional Product Field
Plugin URI: https://sitech.com.pe/
Description: Adds an additional text field to the creation and editing of a product in WooCommerce.
Version: 1.0.0
Author: Irwin Valera
Author URI: https://grupoverdandi.com/
License: GPL2
*/

// // Agregar campos adicionales de imagen y archivo a la página de creación y edición de productos de WooCommerce
// function custom_woocommerce_product_fields() {
//     // Campo de imagen adicional
//     woocommerce_wp_media_input( array(
//         'id'         => 'additional_image',
//         'label'      => __( 'Additional Image', 'codewp' ),
//         'desc_tip'   => true,
//         'description' => __( 'Upload an additional image for the product.', 'codewp' ),
//     ) );

//     // Campo de archivo adicional
//     woocommerce_wp_file_input( array(
//         'id'         => 'additional_file',
//         'label'      => __( 'Additional File', 'codewp' ),
//         'desc_tip'   => true,
//         'description' => __( 'Upload an additional file for the product.', 'codewp' ),
//     ) );
// }
// add_action( 'woocommerce_product_options_general_product_data', 'custom_woocommerce_product_fields' );

// // Guardar valores de los campos adicionales
// function custom_woocommerce_product_save_fields( $product ) {
//     // Guardar el valor de la imagen adicional
//     $additional_image = $_POST['additional_image'];
//     if ( ! empty( $additional_image ) ) {
//         update_post_meta( $product->get_id(), 'additional_image', esc_url( $additional_image ) );
//     }

//     // Guardar el valor del archivo adicional
//     $additional_file = $_POST['additional_file'];
//     if ( ! empty( $additional_file ) ) {
//         update_post_meta( $product->get_id(), 'additional_file', esc_url( $additional_file ) );
//     }
// }
// add_action( 'woocommerce_process_product_meta', 'custom_woocommerce_product_save_fields' );




// // Add a custom text field to the product general settings
// function woocommerce_additional_product_field() {
//     global $woocommerce, $post;
    
//     echo '<div class="options_group">';
    
//     // Text field HTML
//     woocommerce_wp_text_input(
//         array(
//             'id' => 'additional_field',
//             'label' => __('Marca', 'codewp'),
//             'placeholder' => __('Ingresa la marca', 'codewp'),
//             'desc_tip' => 'true',
//             'description' => __('This is an additional field for the product.', 'codewp')
//         )
//     );
    
//     echo '</div>';
// }
// add_action('woocommerce_product_options_general_product_data', 'woocommerce_additional_product_field');

// // Save the custom text field value
// function woocommerce_save_additional_product_field($post_id) {
//     $additional_field = $_POST['additional_field'];
//     if (!empty($additional_field)) {
//         update_post_meta($post_id, 'additional_field', sanitize_text_field($additional_field));
//     }
// }
// add_action('woocommerce_process_product_meta', 'woocommerce_save_additional_product_field');

// // Display the custom text field on the product page
// function woocommerce_display_additional_product_field() {
//     global $product;
    
//     $additional_field = get_post_meta($product->get_id(), 'additional_field', true);
    
//     if (!empty($additional_field)) {
//         echo '<div class="additional-field">';
//         echo '<h3>' . __('Additional Field', 'codewp') . '</h3>';
//         echo '<p>' . $additional_field . '</p>';
//         echo '</div>';
//     }
// }
// add_action('woocommerce_single_product_summary', 'woocommerce_display_additional_product_field', 25);