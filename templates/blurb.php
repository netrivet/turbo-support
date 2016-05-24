<?php
/**
 * Template Name: Blurb
 * The template for displaying custom post type 'blurb'
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

if (! defined('ABSPATH')) {
    exit;
}

// Start a new loop
while ( have_posts() ) : the_post();

	$key = "blurb_type";
	$type = get_post_meta( $post->ID, $key, true );

	if ( is_single() ) :
		echo '<div class="blurb blurb-type-' . $type . '">';

		/* render Font Awesome icon to the left of the content based on custom post type */
		switch ( $type ) {
			case 'info':
				echo '<div class="blurb-icon"><i class="fa fa-info-circle"></i></div>';
				break;
			case 'notice':
				echo '<div class="blurb-icon"><i class="fa fa-exclamation-circle"></i></div>';
				break;
			case 'warning':
				echo '<div class="blurb-icon"><i class="fa fa-times-circle"></i></div>';
				break;
			default:
				echo '<!-- no matched blurb -->';
		}

		echo '<div class="blurb-content">';
	endif;

	echo get_the_content();

	if( is_single() ) :

		echo '</div></div>';

	endif;

endwhile;
