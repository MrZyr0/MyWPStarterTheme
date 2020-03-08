<?php
/**
 * Register styles & scripts
 */
function mywpstartertheme_register_styles_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	// STYLES
	wp_register_style( 'mywpstartertheme__style--main', get_stylesheet_uri(), array(), $theme_version );
	wp_register_style('mywpstartertheme__style--admin', get_template_directory_uri().'/admin.css', array(), $theme_version);

	// TODO: add differents stylesheets for differents wbe browser
	// READ: https://developer.wordpress.org/reference/functions/wp_style_add_data/#comment-996

	// TODO: add print stylesheet
	// SEE: Twenty Twenty's functions.php line 191


	// SCRIPTS
	wp_register_script( 'mywpstartertheme__script--skip-link-focus-fix', get_template_directory_uri() . '/js/modules-scripts/skip-link-focus-fix.js', array(), '2017.06.15' );
	wp_register_script( 'mywpstartertheme__script--outline-remover', get_template_directory_uri() . '/js/modules-scripts/outline.js', array(), 'v1.2.0' );
	wp_register_script( 'mywpstartertheme__script--accessibility-helper', get_template_directory_uri() . '/js/modules-scripts/accessibility-helper.js', array(), 'v1.0.0' );

	// TODO: add script for comment reply
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'init', 'mywpstartertheme_register_styles_scripts' );


/**
 * Enqueue styles & scripts
 */
function mywpstartertheme_enqueue_styles_scripts() {

	// STYLES
	wp_enqueue_style( 'mywpstartertheme__style--main' );

	// SCRIPTS
	wp_enqueue_script( 'mywpstartertheme__script--skip-link-focus-fix' );
	wp_enqueue_script( 'mywpstartertheme__script--outline-remover' );
	wp_enqueue_script( 'mywpstartertheme__script--accessibility-helper' );
	
	// Update Jquery if ie doesn't interest you :)
	// wp_deregister_script( 'jquery' );
  // wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '3.4.1' );
}
add_action( 'wp_enqueue_scripts', 'mywpstartertheme_enqueue_styles_scripts' );


/**
 * Enqueue styles & scripts for BackOffice
 */
function mywpstartertheme_enqueue_admin_styles_scripts() {
	
	// STYLES
	wp_enqueue_style('mywpstartertheme__style--admin');

	// SCRIPTS
}
add_action('admin_enqueue_scripts', 'mywpstartertheme_enqueue_admin_styles_scripts');


/**
 * Enqueue styles & scripts for Customizer controls & settings.
 */
// function mywpstartertheme_enqueue_customizer_styles_scripts() {
	
// 	// STYLES

// 	// SCRIPTS
// }
// add_action('customize_controls_enqueue_scripts', 'mywpstartertheme_enqueue_admin_style');


/**
 * Enqueue scripts for the customizer preview.
 */
// function mywpstartertheme_enqueue_customizer_preview_styles_scripts() {
	
// 	// STYLES

// 	// SCRIPTS
// }
// add_action( 'customize_preview_init', 'mywpstartertheme_enqueue_customizer_preview_styles_scripts' );


// TODO: add style to bloc editor


// TODO: add the possibility to use TinyMCE with previous style


/**
 * Register navigation menus uses wp_nav_menu in five places.
 * 
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
function mywpstartertheme_menus() {

	register_nav_menus( array(
		'navbar' => __( 'Navigation Bar', 'mywpstartertheme' ),
		'footer' => __( 'Footer', 'mywpstartertheme' ),
		// 'primary'  => __( 'Desktop Horizontal Menu', 'mywpstartertheme' ),
		// 'expanded' => __( 'Desktop Expanded Menu', 'mywpstartertheme' ),
		// 'mobile'   => __( 'Mobile Menu', 'mywpstartertheme' ),
		// 'footer'   => __( 'Footer Menu', 'mywpstartertheme' ),
		// 'social'   => __( 'Social Menu', 'mywpstartertheme' ),
	));
}
add_action( 'init', 'mywpstartertheme_menus' );


/**
 * REGISTER WIDGET AREA (sidebars)
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/
 */
function mywpstartertheme_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	);

	register_sidebar( array_merge( $shared_args, array(
		'name'        => __( 'Archive sidebar', 'mywpstartertheme' ),
		'id'          => 'mywpstartertheme__sidebar--archive',
		'description' => __( 'Widgets in this area will be displayed in the sidebar of archive & search pages.', 'mywpstartertheme' ),
	)));

	register_sidebar( array_merge( $shared_args, array(
		'name'        => __( 'Footer', 'mywpstartertheme' ),
		'id'          => 'mywpstartertheme__sidebar--footer',
		'description' => __( 'Widgets in this area will be displayed in the first column of the footer.', 'mywpstartertheme' ),
	)));

}
add_action( 'widgets_init', 'mywpstartertheme_sidebar_registration' );


// TODO: customize read more link
// READ: https://hostpapasupport.com/customize-wordpress-read-link/

/**
 * Test WP's environment
 * 
 * Allows to test if the site is local or on a remote server
 * 
 * @return bool true: WP is local | false: WP is on distant server
 */
function is_localhost() {
	return ( $_SERVER['REMOTE_ADDR'] == "127.0.0.1" or $_SERVER['REMOTE_ADDR'] == "::1" );
}

// TODO: add control for that
// Normally it need to set in config.php at root of WP
if(!WP_DEBUG) { 
  define( 'WP_DEBUG', is_localhost() );
  define( 'WP_DEBUG_DISPLAY', is_localhost() );
  define( 'SCRIPT_DEBUG', is_localhost() );
  define( 'WP_DEBUG_LOG', ! is_localhost() );
}
