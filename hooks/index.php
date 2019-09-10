<?php
require_once __DIR__ . '/enqueue.php';
require_once __DIR__ . '/breadcrumbs.php';
require_once __DIR__ . '/accordion.php';
require_once __DIR__ . '/search.php';
require_once __DIR__ . '/pages.php';
add_action('plugins_loaded', function () {
    if (class_exists('\WooCommerce')) {
        require_once __DIR__ . '/woocommerce.php';
    }
});
