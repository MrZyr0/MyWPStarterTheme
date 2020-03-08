<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
*/
function mywpstartertheme_setup() {

	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/**
	 * Add all post format support
	 * 
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-formats
	 */
	// TODO: Add post formats support
	
	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
	 */
	// TODO: optimize thumbnail sizes (change medium to 1200px & large to 1920px)
	add_theme_support( 'post-thumbnails' );

	/**
	 * Set up the WordPress core custom background feature.
	 * 
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
	 */
	// TODO: Add custom background (image & native color) support

	/**
	 * Implement the Custom Header feature.
	 * 
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header
	 */
	add_theme_support( 'custom-header', array(
		'width'					=> 2048,
		'height'				=> 1080,
		'flex-height'		=> true,
		'flex-width'		=> true,
		'header-text'   => false,	// disable default color selector for header text ( Duplicates with mywpstartertheme's custom control )
		)
	);

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 256,
		'width'       => 256,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/**
	 * Add default posts and comments RSS feed links to head.
	 * 
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 * 
	 * The documentation is incomplete, according to Twenty-Twenty's function.php & https://developer.wordpress.org/reference/functions/add_theme_support/#comment-3528
	 * 
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style',
	) );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 * 
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable WP to do selective refresh in customizer
	 * 
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
	 */
	// TODO: Add selective customizer refresh support

	/** Add support for full and wide align images.
	 * 
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#comment-3120
	 */
	add_theme_support( 'align-wide' );

	// TODO: add editor color palette support
	// READ: https://developer.wordpress.org/block-editor/developers/themes/theme-support/


	/** FUNCTIONS **/

	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme. Based on Twenty Twenty sources
	 */
	require_once 'class-mywpstartertheme-script-loader.php';
	$loader = new MyWPStarterTheme_Script_Loader();
	add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );


	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mywpstartertheme, use a find and replace
	 * to change 'mywpstartertheme' to the name of your theme in all the template files.
	 */
	// TODO: init translation
	load_theme_textdomain( 'mywpstartertheme' );

	// TODO add starter content support
	//https://developer.wordpress.org/reference/functions/add_theme_support/#comment-2676

	// TODO: add retina support
	// If the retina setting is active, double the recommended width and height.
	// if ( get_theme_mod( 'retina_logo', false ) ) {
	// 	$logo_width  = floor( $logo_width * 2 );
	// 	$logo_height = floor( $logo_height * 2 );
	// }
}
add_action( 'after_setup_theme', 'mywpstartertheme_setup' );
