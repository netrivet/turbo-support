<?php

add_action( 'init', 'format_single_product_page', 100);

function format_single_product_page() {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    add_action( 'woocommerce_before_single_product_summary', function() {
        the_content();
    }, 10 );
}

function pp_woo_cart() {
    if (WC()->cart->get_cart_contents_count() == 0) {
        return '';
    }
    $pluginRoot = dirname(__DIR__);
    ob_start();
    require $pluginRoot . '/views/woo_cart.php';
    return ob_get_clean();
}

add_shortcode('pp_woo_cart', 'pp_woo_cart');
