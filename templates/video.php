<?php
/**
 * Template Name: External Video
 * The template for displaying custom post type 'video'
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

	$key="youtube_id";
	$ytid = get_post_meta( $post->ID, $key, true );

	if ( is_single() && $ytid != null ) :
		echo '<div id="int-vid-id-' . $post->ID . '" class="embed-container"><iframe src="https://www.youtube.com/embed/' . $ytid . '"?rel=0 frameborder="0" allowfullscreen></iframe></div>';

		echo '<div class="video-script script-id-' . $post->ID . '">' .
			 the_content() .
			 '</div><!-- .video-script -->';
	endif;

endwhile;

