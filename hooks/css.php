<?php

$pluginRoot = dirname(__DIR__);

/**
 * Enqueues all css in the css directory
 */
add_action('wp_enqueue_scripts', function () use ($pluginRoot) {
    $cssFiles = glob("$pluginRoot/css/*.css");
    foreach ($cssFiles as $file) {
        $base = basename($file);
        $url = plugins_url("css/$base", __DIR__);
        wp_enqueue_style("turbo-$base", $url);
    }
});
