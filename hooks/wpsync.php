<?php

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
		'href'	=> admin_url( 'tools.php?page=wpsync' ),
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
	check_ajax_referer( 'wpsync_nonce' );
	$cmd = 'wpsync';
	exec( $cmd, $retArr, $retVal );
	if( $retVal == 0 ) {
		$output = sprintf( "Success running command %s", $cmd );
	} else {
		$output = sprintf( "Failed to execute command %s".PHP_EOL."return code: %s", $cmd, $retVal );
	}
	if( $retArr ) {
		$output .= PHP_EOL . sprintf( "%s results:", $cmd );
		foreach( $retArr as $line ) {
			$output .= PHP_EOL . $line;
		}
	}
	echo $output;
	wp_die();
}

add_action('admin_menu', 'wpsync_register_tools_submenu_page');
function wpsync_register_tools_submenu_page() {
	add_submenu_page( 
		'tools.php',
		'WP Sync',
		'WPSYNC',
		'edit_theme_options',
		'wpsync',
		'wpsync_tools_submenu_page_callback' 
	);
}

function wpsync_tools_submenu_page_callback() {
    echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
    echo '<h2>WPSYNC Results</h2>';
    echo '<p><button id="wpsync-go">Begin WPSYNC</button></p>';
    echo '<div><textarea id="wpsync-results" style="width: 100%; height: 75vh;"></textarea></div>';
    echo '</div>';
}