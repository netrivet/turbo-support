<?php

/**
 * Sets offset for scrolling accordion items to ensure they don't fall
 * behind our fixed header, and default-on 'autoclose' and 'clicktoclose'
 * See: https://wordpress.org/plugins/accordion-shortcodes/other_notes/
 */
add_filter('shortcode_atts_accordion', function($atts) {
    
    if ( !isset( $atts['scroll'] ) || 							// shortcode doesn't have 'scroll' or ...
    	 ( isset( $atts['scroll'] ) && $atts['scroll'] ) ) {	// shortcode is set 'scroll=true' ...
    	$atts['scroll'] = 80;									// turn scroll ON with 80px of top offset
    }															// setting 'scroll=false' will disable scroll
    
    if ( !isset( $atts['autoclose'] ) ) {						// shortcode doesn't have 'autoclose' ...
        $atts['autoclose'] = true;								// turn autoclose ON
    }

    if ( !isset( $atts['clicktoclose'] ) ) {					// shortcode doesn't have 'clicktoclose' ...
        $atts['clicktoclose'] = true;							// turn clicktoclose ON
    }

    return $atts;
}, 10, 3);
