<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mywpstartertheme
 */

if (is_localhost()) {
	echo '<!-- Header Template : header.php - START -->';
} ?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- declare HTML5 semantics-->
	<!-- TODO: Improve support (READ: <https://stackoverflow.com/questions/11667094/html5-semantic-elements-and-old-browsers>) -->
	<!-- TODO: Add own script loader to enable these srcripts on all browser needed (READ: <https://github.com/aFarkas/html5shiv#the-html5-shiv>) -->
	<!--[if lt IE 10]>
	<script type="text/javascript" src="<?= get_source_path('module-script', 'html5shiv.js') ?>"></script>
	<script type="text/javascript" src="<?= get_source_path('module-script', 'html5shiv-printshiv.js') ?>"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<noscript tabindex="0"><p><?= __('Attention, allow Javascript to have a complete support of accessibility', 'mywpstartertheme') ?></p></noscript>
	<a id="skip-link" class="skip-link screen-reader-text" href="#site-content"><?= __( 'Skip to the content', 'mywpstartertheme' ) ?></a>
	<?php wp_body_open(); ?>

	<header id="masthead" class="site-header">
	
		<?php
		if (get_theme_mod( 'mywpstartertheme__theme_options__navbar--show', true )) {
		// TODO: display a placeholder with an "how to" if there is no menu on customizer (admin login)
		// TODO: enable to replace custom logo by site title or another text
		// TODO: add a warning when display empty navbar
		?>

			<nav id="site-navigation" class="main-navigation navbar--size" role="navigation">

			<?php
			if (has_nav_menu('navbar')) {
				// TODO: fix submenu display bug (when parent menu is focus or hover the child is focusable)
			?>
				<label id="site-navigation__burger-menu__checkbox__label" for="site-navigation__burger-menu__checkbox" class="screen-reader-text"><?= __('Navigation toggle', 'mywpstartertheme') ?></label>
				<input type="checkbox" name="site-navigation__burger-menu__checkbox" id="site-navigation__burger-menu__checkbox" role="checkbox" aria-labelledby="site-navigation__burger-menu__checkbox__label" aria-label="Navigation toggle" aria-checked="false" onclick="burger_menu_toogle(event)" onkeydown="burger_menu_toogle(event)"/>
				
				<?php
				if (get_theme_mod( 'mywpstartertheme__theme_options__navbar__logo--show', true ) && get_theme_mod( 'custom_logo' )) {
					
					$custom_logo_id = get_theme_mod( 'custom_logo' );

					$custom_logo__img_url = wp_get_attachment_url($custom_logo_id);

					$custom_logo__img_meta = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);

					$custom_logo__link;

					switch (get_theme_mod('mywpstartertheme__theme_options__navbar__logo__link', 'site-url')) {
						case 'site-url':
							$custom_logo__link = get_site_url();
						break;

						case 'blog-url':
							$custom_logo__link = get_home_url();
						break;
						
						case 'none':
							$custom_logo__link = '';
						break;

						default:
							$custom_logo__link = get_site_url();
						break;
					}

					// TODO: add an input for that
					$custom_logo__link_text = __('Return to home', 'mywpstartertheme');

					
					$custom_logo__html_markup = "<li id=\"menu-item-0\" class=\"menu-item menu-item-0 menu-item-custom-logo\">" .
																				"<img src=\"$custom_logo__img_url\" alt=\"$custom_logo__img_meta\">" .
																				"<a href=\"$custom_logo__link\">$custom_logo__link_text</a>" .
																			"</li>";

					$navbar__menu = wp_nav_menu( array(
								'menu_class'        => 'main-navigation__menu',
								'container'         => false,
								'theme_location'    => 'navbar',
								'echo'							=> false,
								'walker'						=> new Add_Element_Walker($custom_logo__html_markup, 0),
					));

					echo $navbar__menu;
				} else {
					wp_nav_menu( array(
						'menu_class'        => 'main-navigation__menu',
						'container'         => false,
						'theme_location'    => 'navbar',
						'walker'						=> new Cleanup_Menu_Walker,
					));
				}

				if(get_theme_mod( 'mywpstartertheme__theme_options__navbar__search--show', true )) {
					get_search_form();
				}
				?>
				<label id="site-navigation__burger-menu__icon" for="site-navigation__burger-menu__checkbox">
					<span class="color--accent-background"></span>
					<span class="color--accent-background"></span>
					<span class="color--accent-background"></span>
					<span class="color--accent-background"></span>
				</label>
				<?php

			} else {

					if (get_theme_mod( 'mywpstartertheme__theme_options__navbar__logo--show', true ) && get_theme_mod( 'custom_logo' )) {
						
						$custom_logo_id = get_theme_mod( 'custom_logo' );

						$custom_logo__img_url = wp_get_attachment_url($custom_logo_id);

						$custom_logo__img_meta = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);

						$custom_logo__link;

						switch (get_theme_mod('mywpstartertheme__theme_options__navbar__logo__link', 'site-url')) {
							case 'site-url':
								$custom_logo__link = get_site_url();
							break;

							case 'blog-url':
								$custom_logo__link = get_home_url();
							break;
							
							case 'none':
								$custom_logo__link = '';
							break;

							default:
								$custom_logo__link = get_site_url();
							break;
						}

						// TODO: add an input for that
						$custom_logo__link_text = __('Return to home', 'mywpstartertheme');

						
						$custom_logo__html_markup = "<ul id=\"menu-navbar\" class=\"main-navigation__menu\">" .
																					"<li id=\"menu-item-0\" class=\"menu-item menu-item-0 menu-item-custom-logo\">" .
																						"<img src=\"$custom_logo__img_url\" alt=\"$custom_logo__img_meta\">" .
																						"<a href=\"$custom_logo__url\">$custom_logo__url_text</a>" .
																					"</li>" .
																				"</ul>";

						echo $custom_logo__html_markup;
					}

					if(get_theme_mod( 'mywpstartertheme__theme_options__navbar__search--show', true )) {
						get_search_form();
					}
				}
					?>
					</nav>
		<?php
		}
		?>


<?php if (is_localhost()): ?>
	<!-- Header Template : header.php - END -->
<?php endif; ?>
