<?php

require_once plugin_dir_path(__DIR__).'classes/Process.php';

/**
* Add wpsync button to wp admin bar
*
* @param \WP_Admin_Bar $adminBar
*/
function addWpsyncButton($wp_admin_bar)
{
	$args = array(
		'id'	=> 'support-wpsync',
		'title'	=> '<span class="ab-icon dashicons dashicons-upload"></span><span class="ab-label">'.__( 'WPSYNC', 'textdomain' ).'</span>',
		'href'	=> '',
		'meta'	=> array(
			'target'	=> '_self',
			'title'		=> __( 'Sync to production', 'textdomain' ),
		),
	);
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'addWpsyncButton', 999 );

add_action('admin_enqueue_scripts', 'wpsync_ajax_load_scripts');
function wpsync_ajax_load_scripts() {
	// load our jquery file that sends the $.post request
	wp_enqueue_script( "ajax-wpsync", 
		plugin_dir_url( __DIR__ ) . '/js/ajax-wpsync.js', 
		array( 'jquery' ) 
	);

	$wpsync_nonce = wp_create_nonce( 'wpsync_nonce' );

	// make the ajaxurl var available to the above script
	wp_localize_script( 'ajax-wpsync', 'wpsync_ajax_obj', 
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ), 
			'nonce'    => $wpsync_nonce, 
		) );	
}

add_action('wp_ajax_wpsync_action', 'wpsync_ajax_handler');
function wpsync_ajax_handler() {
	// first check if data is being sent and that it is the data we want
  	if ( isset( $_POST["post_var"] ) ) {
		// now set our response var equal to that of the POST var (this will need to be sanitized based on what you're doing with with it)wpsync_action
		$response = $_POST["post_var"];
		// send the response back to the front end
		echo $response;
		wp_die();
	}
}
