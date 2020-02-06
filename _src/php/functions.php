<?php
/**
 * MyWPStarterTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MyWPStarterTheme
 */

if ( ! function_exists( 'MyWPStarterTheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function MyWPStarterTheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on MyWPStarterTheme, use a find and replace
		 * to change 'MyWPStarterTheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'MyWPStarterTheme', get_template_directory() . '/languages' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			// code tag									WordPress backend tag
			'navbar-menu' => esc_html__( 'Navigation Bar', 'MyWPStarterTheme' ),
			'footer-menu' => esc_html__( 'Footer', 'MyWPStarterTheme' ),
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'MyWPStarterTheme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/**
		 * Implement the Custom Header feature.
		 */
		add_theme_support( 'custom-header', array(
			'width'                  => 2048,
			'height'                 => 1080,
			'flex-height'            => true,
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'MyWPStarterTheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function MyWPStarterTheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'MyWPStarterTheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'MyWPStarterTheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function MyWPStarterTheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'MyWPStarterTheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'MyWPStarterTheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'MyWPStarterTheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function MyWPStarterTheme_scripts() {
	wp_enqueue_style( 'MyWPStarterTheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'MyWPStarterTheme-skip-link-focus-fix', get_template_directory_uri() . '/js/modules/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'MyWPStarterTheme_outline-remover', get_template_directory_uri() . '/js/modules/outline.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'MyWPStarterTheme_scripts' );

/**
 * Add css sylesheet to admin backoffice
 */
function admin_style()
{
	wp_enqueue_style('MyWPStarterTheme__admin-styles', get_template_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

/**
 * Customizer additions.
 */
require get_template_directory() . '/modules/customizer.php';



/**
 * Disable comments
 *
 */
// TODO: ADD CONTROL TO DO THAT
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


/*
** Cleaning Wordpress
*/

/** <head> **/
// Disable WordPress generator meta balise
// TODO : Instead of deleting the line, it must be optimized to give the generation by WordPress with which theme, developed by whom and see if it is necessary to add the plugins.
remove_action('wp_head', 'wp_generator');

// Disable WordPress wlwmanifest link balise
remove_action('wp_head', 'wlwmanifest_link');

// Disable WordPress wlwmanifest link balise
remove_action('wp_head', 'rsd_link');

// Disable WordPress shortlink link balise
remove_action('wp_head', 'wp_shortlink_wp_head');

// Disable WordPress rest API link meta balise
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Disable WordPress emojis script support meta balise
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/** Core **/

# ADMIN
// Theme editor
define( 'DISALLOW_FILE_EDIT', true );

// Welcome Panel
remove_action('welcome_panel', 'wp_welcome_panel');

# Navigation
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var)
{
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
