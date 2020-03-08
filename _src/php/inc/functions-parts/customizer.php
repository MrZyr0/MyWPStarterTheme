<?php
/**
 * MyWPStarterTheme Theme Customizer
 *
 * @package mywpstartertheme
 * @link https://developer.wordpress.org/themes/customize-api/
*/


/** Good tutorials
 * https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-1
 * https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-2
 * https://github.com/maddisondesigns/customizer-custom-controls
 * https://divpusher.com/blog/wordpress-customizer-sanitization-examples/
*/

/** Theme personnalisation menu structure
 * Pannel > (Section) > Setting > Control
 * https://developer.wordpress.org/files/2017/01/Customize-Object-Hierarchy-Graphic-768x432.png
*/


/** Customizer structure
 * Title															ID													Priority
 * Site identity [SECTION] 						title_tagline											20
 *		custom_logo ( on theme support 'custom-logo' )
 *		blogname
 *		blogdescription
 *		site_icon
 *		header_text ( on theme support 'custom-logo' & 'header-text' )
 *		display_header_text 	=> setting 'header_textcolor' ( on theme support 'custom-header' & 'default-text-color' )
 *
 * Colors [SECTION]										colors														40
 *		header_textcolor ( on theme support 'custom-header' & 'header-text' )
 *		background_color ( on theme support 'custom-background' & 'default-color' )
 *		
 * Header Image [SECTION]							header_image											60
 *					( on theme support 'custom-header' & 'default-image' )
 *		header_video
 *		external_header_video
 *
 * Background Image [SECTION]					background_image									80
 *					( on theme support 'custom-background' )
 *		background_preset
 * 		background_position
 *		background_size
 *		background_repeat
 *		background_attachment
 *
 * Menus [PANEL]											nav_menus													100
 *
 * Widgets [PANEL]										widgets														110
 * 
 * Theme options [PANNEL]							mywpstartertheme__theme_options		111
 * 
 * Static Front Page [SECTION]				static_front_page									120
 *		show_on_front ( on option 'show_on_front' )
 *		page_on_front
 *		page_for_posts
 *
 * default [SECTION]									***																160
 * 
 * Widget Blocks (Experimental)				---																---
 * 
 * Additional CSS [SECTION]						custom_css												200
*/

/** Controls type
 * all HTML5 inputs : text, hidden, number, range, url, tel, email, search, time, date, datetime, week
 * checkbox
 * textarea
 * radio
 * select
 * dropdown-pages
 * 
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/#controls
*/

/**
 * Load all custom Customizer Custom Controls
 */
// TODO: Create custom controls
// require_once require_once get_template_directory() . '/inc/functions-parts/customizer__custom_controls.php';


/**
 * Add custom settings
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mywpstartertheme_customizer__register( $wp_customize ) {

	$wp_customize->remove_section('custom_css');		// By default a user doesn't need to modify CSS


	/** SITE IDENTITY [SECTION]
	 *
	*/

	/** Section content
	 * Title											ID
	 * Site title									blogname
	 * Tagline										blogdescription
	 * header_text
	 * Site icon									site_icon
	 * custom_logo
	 * display_header_text
	*/

	$wp_customize->remove_control('header_text');
	$wp_customize->remove_control('display_header_text');


	/** COLORS [SECTION]
	 *
	*/

	/** Section content
	 * Title											ID
	 * Main												mywpstartertheme__colors--main
	 * Accent											mywpstartertheme__colors--accent
	 * Call to action							mywpstartertheme__colors--cta
	 * Text												mywpstartertheme__colors--text
	 * Subtitle										mywpstartertheme__colors--subtitle
	 * Placeholder								mywpstartertheme__colors--placeholder
	 * Page background						mywpstartertheme__colors--page-background
	 * Page content background		mywpstartertheme__colors--content-background
	 * Reset input								mywpstartertheme__colors--reset
	*/


	$wp_customize->add_setting( 'mywpstartertheme__colors--main', array(
			'default' => '#F5EFE0',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mywpstartertheme__colors--main', array(
			'label' => __( 'Main color', 'mywpstartertheme' ),
			'description' => __( 'Used for the background and as the default color', 'mywpstartertheme' ),
			'section' => 'colors',
		)
	));


	$wp_customize->add_setting( 'mywpstartertheme__colors--accent', array(
			'default' => '#CD2653',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mywpstartertheme__colors--accent', array(
			'label' => __( 'Accent color', 'mywpstartertheme'  ),
			'description' => __( 'Used for contours, active elements etc...', 'mywpstartertheme'  ),
			'section' => 'colors',
		)
	));


	$wp_customize->add_setting( 'mywpstartertheme__colors--cta', array(
			'default' => '#CD2653',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mywpstartertheme__colors--cta', array(
			'label' => __( 'Call to action color', 'mywpstartertheme'  ),
			'description' => __( 'Accent color specific to CTA', 'mywpstartertheme'  ),
			'section' => 'colors',
		)
	));


	$wp_customize->add_setting( 'mywpstartertheme__colors--text', array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mywpstartertheme__colors--text',array(
			'label' => __( 'Font color', 'mywpstartertheme'  ),
			// 'description' => __(''),
			'section' => 'colors',
		)
	));

	$wp_customize->add_setting( 'mywpstartertheme__colors--subtitle', array(
	      'default' => '#6D6D6D',
	      'sanitize_callback' => 'sanitize_hex_color'
	   )
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mywpstartertheme__colors--subtitle', array(
			'label' => __( 'Subtitle text color', 'mywpstartertheme'  ),
			// 'description' => __(''),
			'section' => 'colors',
		)
	));


	$wp_customize->add_setting( 'mywpstartertheme__colors--placeholder', array(
			'default' => '#6D6D6D',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mywpstartertheme__colors--placeholder', array(
			'label' => __( 'Placeholder', 'mywpstartertheme'  ),
			'description' => __( 'Color used for placeholder, smaller subtitles and unimportant text', 'mywpstartertheme'  ),
			'section' => 'colors',
	   )
	));


	$wp_customize->add_setting( 'mywpstartertheme__colors--page-background', array(
	      'default' => '#F5EFE0',
	      'sanitize_callback' => 'sanitize_hex_color'
	   )
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mywpstartertheme__colors--page-background', array(
			'label' => __( 'Page background color', 'mywpstartertheme'  ),
			// 'description' => __( '', 'mywpstartertheme'  ),
			'section' => 'colors',
	   )
	));


	$wp_customize->add_setting( 'mywpstartertheme__colors--content-background', array(
		'default' => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mywpstartertheme__colors--content-background', array(
			'label' => __( 'Content background color', 'mywpstartertheme'  ),
			'description' => __( 'Background color behind page content', 'mywpstartertheme'  ),
			'section' => 'colors',
		)
	));

	// TODO: add support of rgba
	$wp_customize->add_setting( 'mywpstartertheme__colors--navbar-background', array(
		'default' => '#FFFFFF',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mywpstartertheme__colors--navbar-background', array(
			'label' => __( 'Navbar background color', 'mywpstartertheme'  ),
			// 'description' => __( 'Background color ', 'mywpstartertheme'  ),
			'section' => 'colors',
		)
	));

	$wp_customize->add_setting( 'mywpstartertheme__colors--reset', array(
			'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( 'mywpstartertheme__colors--reset', array(
		'label' => __( 'Reset colors', 'mywpstartertheme'  ),
		'description' => __('Type "Reset colors !" and publish settings to reset all colors to the default theme values. <br> <b>THEN REFRESH THE PAGE !</b>'),
		'section' => 'colors',
		'type' => 'text',
		'input_attrs' => array(
			'placeholder' => __( 'Reset colors !', 'mywpstartertheme'  ),
			'class' => __('customizer_colors__reset_input', 'mywpstartertheme' )
		),
	));


	/** THEME OPTIONS [PANNEL]
	 *
	*/
	// $wp_customize->add_panel( 'mywpstartertheme__theme_options', array(
	// 	'title' => __( 'Theme options' ),
	// 	'description' => __( 'Manage theme features' ),
	// 	'priority'	=>	'111',
	// 	)
	// );

	$wp_customize->add_section( 'mywpstartertheme__theme_options__navbar', array(
		'title' => __( 'Navigation bar' ),
		'description' => __( 'Manage navabar features' ),
		// 'pannel'	=> 'mywpstartertheme__theme_options',
		'priority'	=>	'41',
		)
	);

	// $wp_customize->add_section( 'mywpstartertheme__theme_options__header', array(
	// 	'title' => __( 'Header' ),
	// 	'description' => __( 'Manage header features' ),
	// 	'pannel'	=> 'mywpstartertheme__theme_options'
	// 	)
	// );

	/** Section content
	 * Title											ID
	 * navbar__search							--
	 * 
	*/
	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar--show', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__checkbox',
		'default'	=>	'true',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar--show', array(
			'type' => 'checkbox',
			'label' => __( 'Show navigation bar', 'mywpstartertheme'  ),
			'description' => __('Completly enable/disable navbar'),
			'section' => 'mywpstartertheme__theme_options__navbar',
	));

	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar--size', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__integer',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar--size', array(
		'label' => __( 'Size of navigation bar', 'mywpstartertheme'  ),
		'description' => __('Set minimum size of navbar (in pixels) <br> <i>Empty = 0</i>'),
		'section' => 'mywpstartertheme__theme_options__navbar',
		'type' => 'number',
	));

	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__logo--show', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__checkbox',
		'default'	=>	'true',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__logo--show', array(
			'type' => 'checkbox',
			'label' => __( 'Display logo in navbar', 'mywpstartertheme'  ),
			// 'description' => __(''),
			'section' => 'mywpstartertheme__theme_options__navbar',
	));

	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__logo__link', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__radio',
		'default'	=>	'site-url',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__logo__link', array(
			'type' => 'radio',
			'label' => __( 'Link used for logo', 'mywpstartertheme'  ),
			// 'description' => __(''),
			'section' => 'mywpstartertheme__theme_options__navbar',
			'choices' => array(
				'site-url' => __( 'Site URL' ),
				'blog-url' => __( 'Blog URL' ),
				'none' => __( 'None' ),
				// TODO: add the possibility to specify another link
			),
	));

	// $wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__logo__position--desktop', array(
	// 	'sanitize_callback' => 'mywpstartertheme__sanitize__navbar_element_position',
	// 	'default'	=>	'0',
	// ));
	// $wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__logo__position--desktop', array(
	// 		'type' => 'number',
	// 		'label' => __( 'Logo position - Desktop', 'mywpstartertheme'  ),
	// 		'description' => __('Position of the logo in navbar on desktop'),
	// 		'section' => 'mywpstartertheme__theme_options__navbar',
			// 'input_attrs' => array( // Optional.
			// 	 'placeholder' => __( 'Default : 1' ),
			// 	 'min'	=>	__('0'),
			// 	 'max'	=>	__('2'),
      // ),
	// ));

	// $wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__logo__position--mobile', array(
	// 	'sanitize_callback' => 'mywpstartertheme__sanitize__navbar_element_position',
	// 	'default'	=>	'0',
	// ));
	// $wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__logo__position--mobile', array(
	// 		'type' => 'number',
	// 		'label' => __( 'Logo position - Mobile', 'mywpstartertheme'  ),
	// 		'description' => __('Position of the logo in navbar on mobile'),
	// 		'section' => 'mywpstartertheme__theme_options__navbar',
			// 'input_attrs' => array( // Optional.
			// 	 'placeholder' => __( 'Default : 1' ),
			// 	 'min'	=>	__('0'),
			// 	 'max'	=>	__('2'),
      // ),
	// ));

	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__menu__position--desktop', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__navbar_element_position',
		'default'	=>	'0',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__menu__position--desktop', array(
			'type' => 'number',
			'label' => __( 'Menu position - Desktop', 'mywpstartertheme'  ),
			'description' => __('Position of the menu in navbar on desktop'),
			'section' => 'mywpstartertheme__theme_options__navbar',
			'input_attrs' => array( // Optional.
				 'placeholder' => __( 'Default : 0' ),
				 'min'	=>	__('0'),
				 'max'	=>	__('2'),
      ),
	));

	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__menu__position--mobile', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__navbar_element_position',
		'default'	=>	'0',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__menu__position--mobile', array(
			'type' => 'number',
			'label' => __( 'Menu position - Mobile', 'mywpstartertheme'  ),
			'description' => __('Position of the menu in navbar on mobile'),
			'section' => 'mywpstartertheme__theme_options__navbar',
			'input_attrs' => array( // Optional.
				 'placeholder' => __( 'Default : 0' ),
				 'min'	=>	__('0'),
				 'max'	=>	__('2'),
      ),
	));

	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__search__position--desktop', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__navbar_element_position',
		'default'	=>	'2',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__search__position--desktop', array(
			'type' => 'number',
			'label' => __( 'Search form position - Desktop', 'mywpstartertheme'  ),
			'description' => __('Position of the search form in navbar on desktop'),
			'section' => 'mywpstartertheme__theme_options__navbar',
			'input_attrs' => array( // Optional.
				 'placeholder' => __( 'Default : 2' ),
				 'min'	=>	__('0'),
				 'max'	=>	__('2'),
      ),
	));

	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__search__position--mobile', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__navbar_element_position',
		'default'	=>	'2',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__search__position--mobile', array(
			'type' => 'number',
			'label' => __( 'Search form position - Mobile', 'mywpstartertheme'  ),
			'description' => __('Position of the search form in navbar on mobile'),
			'section' => 'mywpstartertheme__theme_options__navbar',
			'input_attrs' => array( // Optional.
				 'placeholder' => __( 'Default : 2' ),
				 'min'	=>	__('0'),
				 'max'	=>	__('2'),
      ),
	));

	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__search--show', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__checkbox',
		'default'	=>	'true',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__search--show', array(
			'type' => 'checkbox',
			'label' => __( 'Display search in navbar', 'mywpstartertheme'  ),
			// 'description' => __(''),
			'section' => 'mywpstartertheme__theme_options__navbar',
	));

	$wp_customize->add_setting( 'mywpstartertheme__theme_options__navbar__shadow--show', array(
		'sanitize_callback' => 'mywpstartertheme__sanitize__checkbox',
		'default'	=>	'true',
	));
	$wp_customize->add_control( 'mywpstartertheme__theme_options__navbar__shadow--show', array(
			'type' => 'checkbox',
			'label' => __( 'Display box shadow behind navbar', 'mywpstartertheme'  ),
			// 'description' => __(''),
			'section' => 'mywpstartertheme__theme_options__navbar',
	));


	
	// Future development
		/** HEADER IMAGE [SECTION]
		 *
		*/

		/** Section content
		 * Title											ID
		*/


		/** BACKGROUND IMAGE [SECTION]
		 *
		*/

		/** Section content
		 * Title											ID
		*/

		
		/** MENUS [PANEL]
		 *
		*/

		/** Section content
		 * Title											ID
		*/


		/** WIDGETS [PANEL]
		 *
		*/

		/** Section content
		 * Title											ID
		*/


		/** STATIC FRONT PAGE [SECTION]
		 *
		*/

		/** Section content
		 * Title											ID
		*/


		/** DEFAULT [SECTION]
		 *
		*/

		/** Section content
		 * Title											ID
		*/


		/** ADDITIONAL CSS [SECTION]
		 *
		*/

		/** Section content
		 * Title											ID
		*/

}
add_action( 'customize_register', 'mywpstartertheme_customizer__register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @return void
 * 
 */
// TODO : Add Live Preview support
// READ: https://codex.wordpress.org/Theme_Customization_API#Part_3:_Configure_Live_Preview_.28Optional.29
// function mywpstartertheme_customizer_preview_js() {
// 	wp_enqueue_script( 'mywpstartertheme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
// }
// add_action( 'customize_preview_init', 'mywpstartertheme_customizer_preview_js' );


// TODO: Improve color reset
/**
 * Reset colors
 *
 * @return void
 * 
 */
function mywpstartertheme_customizer__colors_reset() {
	$askToReset = get_theme_mod('mywpstartertheme__colors--reset', '') == '' ? false : true;

	if ($askToReset) {
		set_theme_mod('mywpstartertheme__colors--main', '#f5efe0');
		set_theme_mod('mywpstartertheme__colors--accent', '#cd2653');
		set_theme_mod('mywpstartertheme__colors--cta', '#cd2653');
		set_theme_mod('mywpstartertheme__colors--text', '#000000');
		set_theme_mod('mywpstartertheme__colors--subtitle', '#6d6d6d');
		set_theme_mod('mywpstartertheme__colors--placeholder', '#6d6d6d');
		set_theme_mod('mywpstartertheme__colors--page-background', '#f5efe0');
		set_theme_mod('mywpstartertheme__colors--content-background', '#FFFFFF');
		set_theme_mod('mywpstartertheme__colors--reset', '');
	}
}
add_action( 'customize_save_after', 'mywpstartertheme_customizer__colors_reset' );


// TODO: Setup all style customizer settings into a css var
function mywpstartertheme_customizer_color__css() {

	$color__main = get_theme_mod('mywpstartertheme__colors--main', '#f5efe0');
	$color__accent = get_theme_mod('mywpstartertheme__colors--accent', '#cd2653');
	$color__cta = get_theme_mod('mywpstartertheme__colors--cta', '#cd2653');
	$color__text = get_theme_mod('mywpstartertheme__colors--text', '#000000');
	$color__subtitle = get_theme_mod('mywpstartertheme__colors--subtitle', '#6d6d6d');
	$color__placeholder = get_theme_mod('mywpstartertheme__colors--placeholder', '#6d6d6d');
	$color__page_background = get_theme_mod('mywpstartertheme__colors--page-background', '#f5efe0');
	$color__content_background = get_theme_mod('mywpstartertheme__colors--content-background', '#FFFFFF');

	$navbar__shadow_box = get_theme_mod( 'mywpstartertheme__theme_options__navbar__shadow--show', true ) ? 'box-shadow: 0 0 5px 0 black;' : null;
?>
	<style type="text/css">
			.color--main { color: <?= $color__main ?>; }
			.color--accent { color: <?= $color__accent ?>; }
			.color--cta { color: <?= $color__cta ?>; }
			.color--text { color: <?= $color__text ?>; }
			.color--subtitle { color: <?= $color__subtitle ?>; }
			.color--placeholder { color: <?= $color__placeholder ?>; }

			.color--main-background { background-color: <?= $color__main ?>; }
			.color--accent-background { background-color: <?= $color__accent ?>; }
			.color--cta-background { background-color: <?= $color__cta ?>; }
			.color--text-background { background-color: <?= $color__text ?>; }
			.color--subtitle-background { background-color: <?= $color__subtitle ?>; }
			.color--placeholder-background { background-color: <?= $color__placeholder ?>; }


			body { background-color: <?= $color__page_background ?>; }
			main { background-color: <?= $color__content_background ?>; }

			body::-webkit-scrollbar-thumb {
				background-color: <?= $color__accent ?>;
			}


			.navbar--size {
				min-height: <?= get_theme_mod( 'mywpstartertheme__theme_options__navbar--size', false ) ?>px;
				height: <?= get_theme_mod( 'mywpstartertheme__theme_options__navbar--size', false ) ?>px;
				max-height: <?= get_theme_mod( 'mywpstartertheme__theme_options__navbar--size', false ) ?>px;
			}

			nav#site-navigation {
				background-color: <?= get_theme_mod( 'mywpstartertheme__colors--navbar-background', '#FFFF' ) ?>;
				<?= $navbar__shadow_box ?>;
			}
			
			nav#site-navigation > ul.main-navigation__menu {
				order: <?= get_theme_mod( 'mywpstartertheme__theme_options__navbar__menu__position--desktop', '0' ) ?>;
			}

			nav#site-navigation > form.search-form {
				order: <?= get_theme_mod( 'mywpstartertheme__theme_options__navbar__search__position--desktop', '2' ) ?>;
			}


			@media screen and (max-width: 960px) {
				nav#site-navigation > label#site-navigation__burger-menu__icon {
					order: <?= get_theme_mod( 'mywpstartertheme__theme_options__navbar__menu__position--mobile', '0' ) ?>;
				}

				nav#site-navigation > form.search-form {
					order: <?= get_theme_mod( 'mywpstartertheme__theme_options__navbar__search__position--mobile', '2' ) ?>;
				}
			}

		</style>
<?php
}
add_action( 'wp_head', 'mywpstartertheme_customizer_color__css');



/**********************/
/* SANITIZE FUNCTIONS */
/**********************/


// https://gist.github.com/ajskelton/740788f98df3283355dd7e0c2f5abb2a
function mywpstartertheme__sanitize__checkbox( $input ) {
  // Boolean check.
  return ( ( isset( $input ) && true == $input ) ? true : false );
}


// https://gist.github.com/ajskelton/2ed4017fa0842bae49b99888daa998b3
function mywpstartertheme__sanitize__radio( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


function mywpstartertheme__sanitize__integer( $input ) {
	return (int) $input;
}


function mywpstartertheme__sanitize__navbar_element_position( $input ) {
	
	$input = mywpstartertheme__sanitize__integer( $input );

	if($input >= 0 && $input <= 3)
	{
		return (int) $input;
	}
	
	return (int) 0;
}
