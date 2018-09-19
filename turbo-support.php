<?php
/**
 * @package Turbo Support
 * @version 1.1.0
 */
/*
Plugin Name: Turbo Support
Plugin URI: https://pro.photo
Description: Turbo mode for the ProPhoto support site
Author: Brian Scaturro
Version: 1.1.0
Author URI: http://github.com/brianium
*/

add_action('init','enter_turbo_mode');

function enter_turbo_mode(){
	// require hooks
	require 'hooks/index.php';
}
