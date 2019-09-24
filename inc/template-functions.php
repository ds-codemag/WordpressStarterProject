<?php
/**
 * Additional features to allow styling of the templates
 */

/**
 * Adds custom classes to the array of body classes.
 */
function set_body_classes( $classes ) {

	// Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'set_body_classes' );

/**
 * Checks to see if we're on the front page or not.
 */
function check_if_frontpage() {
	return ( is_front_page() && ! is_home() );
}
