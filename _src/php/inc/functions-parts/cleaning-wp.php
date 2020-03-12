<?php
/**************/
/** CLEANING **/
/**************/
// TODO: optimize action by searching when actions are added to delete them directly after and at the right time
// TODO: add control to manage cleaning (create a plugin for that)
// TODO: add auto '/wp-admin/options-discussion.php' configuration & remove the page to the menu


/**
 * Disable comments
 */
// add_action('admin_init', function () {
//     // Redirect any user trying to access comments page
//     global $pagenow;

//     if ($pagenow === 'edit-comments.php') {
//         wp_redirect(admin_url());
//         exit;
//     }

//     // Remove comments metabox from dashboard
//     remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

//     // Disable support for comments and trackbacks in post types
//     foreach (get_post_types() as $post_type) {
//         if (post_type_supports($post_type, 'comments')) {
//             remove_post_type_support($post_type, 'comments');
//             remove_post_type_support($post_type, 'trackbacks');
//         }
//     }
// });

// Close comments on the front-end
// add_filter('comments_open', '__return_false', 20, 2);
// add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
// add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
// add_action('admin_menu', function () {
//     remove_menu_page('edit-comments.php');
// });

// Remove comments links from admin bar
// add_action('init', function () {
//     if (is_admin_bar_showing()) {
//         remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
//     }
// });

// add_action('wp_before_admin_bar_render', function() {
//     global $wp_admin_bar;
//     $wp_admin_bar->remove_menu('comments');
// });
// Disable WordPress recent comments widget style
// function remove_recent_comments_style() {
//     global $wp_widget_factory;
//     remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
// }
// add_action('widgets_init', 'remove_recent_comments_style');


/**
 * Cleaning <head>
*/

remove_action('welcome_panel', 'wp_welcome_panel');
// Disable WordPress generator meta balise
// TODO : Instead of deleting the line, it must be optimized to give the generation by WordPress with which theme, developed by whom and see if it is necessary to add the plugins.
remove_action('wp_head', 'wp_generator');

// Disable WordPress wlwmanifest link balise
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

// Disable WordPress shortlink link balise
// TODO: Create a plugin to change that with own shortlink (like bitly) to track & share the post
remove_action('wp_head', 'wp_shortlink_wp_head');

// Disable WordPress rest API link meta balise
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);


/**
 * Disable the emoji's
 */
// function disable_emojis() {
// 	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
// 	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
// 	remove_action( 'wp_print_styles', 'print_emoji_styles' );
// 	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
// 	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
// 	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
// 	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
// 	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
// }
// add_action( 'init', 'disable_emojis' );

// /**
//  * Filter function used to remove the tinymce emoji plugin.
//  * 
//  * @param    array  $plugins  
//  * @return   array             Difference betwen the two arrays
//  */
// function disable_emojis_tinymce( $plugins ) {
// 	if ( is_array( $plugins ) ) {
// 		return array_diff( $plugins, array( 'wpemoji' ) );
// 	} else {
// 		return array();
// 	}
// }
// Disable WordPress emojis script support meta balise only
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/** Core **/

# ADMIN
// Theme editor
define( 'DISALLOW_FILE_EDIT', true );

// TODO: add control of remove action & define(DISALLOW) to admin user

# Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
// function my_css_attributes_filter($var)
// {
// 	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
// }
