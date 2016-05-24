<?php

/**
 * Adds breadcrumb links after tutorial header is yoast plugin active
 */
add_action('pp_post_render_front/article_open', function () {
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p class="tutorial-breadcrumbs">','</p>');
    }
});
