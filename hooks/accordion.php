<?php

/**
 * Changes default behavior of accordion shortcode parameters.
 * See: https://wordpress.org/plugins/accordion-shortcodes/other_notes/
 */
add_filter('shortcode_atts_accordion', 'set_accordion_shortcode_defaults', 10, 3);
function set_accordion_shortcode_defaults($atts) {

    // Override the autoclose and clicktoclose settings
    $atts['autoclose'] = true;
    $atts['clicktoclose'] = true;
    
    return $atts;
};

/**
 * Sets offset for scrolling accordion items to ensure they don't fall
 * behind our fixed header, and default-on 'autoclose' and 'clicktoclose'
 * See: https://wordpress.org/plugins/accordion-shortcodes/other_notes/
 */
add_filter('shortcode_atts_accordion', function($atts) {
    
    if ( !isset( $atts['scroll'] ) ) { 							// shortcode doesn't have 'scroll' ...
    	$atts['scroll'] = 80;									// turn scroll ON with 80px of top offset
    }
    else if ( $atts['scroll'] ) {								// shortcode is set 'scroll=true' ...
    	$atts['scroll'] = 80;									// override with 80px of top offset
    }															// setting 'scroll=false' will disable scroll

    return $atts;
}, 10, 3);

