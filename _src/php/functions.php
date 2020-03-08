<?php
/**
 * MyWPStarterTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mywpstartertheme
*/



// Cleaning WP
// include optional
include get_template_directory() . '/inc/functions-parts/cleaning-wp.php';


/**
 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
 */
if ( ! function_exists( 'wp_body_open' ) ) {

	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}


require_once get_template_directory() . '/inc/functions-parts/setup.php';


require_once get_template_directory() . '/inc/functions-parts/features.php';


require_once get_template_directory() . '/inc/functions-parts/customizer.php';


require_once get_template_directory() . '/inc/functions-parts/class-mywpstartertheme-cleanup-menu-walker.php';


require_once get_template_directory() . '/inc/functions-parts/class-mywpstartertheme-add-first-element-walker.php';
