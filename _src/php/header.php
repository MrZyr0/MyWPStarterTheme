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
	<a class="skip-link screen-reader-text" href="#content">Aller directement au contenu de la page</a>
	<?php wp_body_open(); ?>

	<header id="masthead" class="site-header">

		<?php // Title ?>
		<?php if ( is_archive() ): ?>
			<?php if ( is_category() ): ?>
				<h1 class="page_title">Tous les postes de la catégorie "<?= strtolower(get_the_category()[0]->name) ?>"</h1>

			<?php elseif ( is_tag() ): ?>
				<h1 class="page_title">Tous les postes de l'étiquette "<?= strtolower( single_tag_title() ) ?>"</h1>

			<?php elseif ( is_author() ): ?>
				<h1 class="page_title">Tous les postes de l'auteur "<?= strtolower( get_the_author() ) ?>"</h1>

			<?php elseif ( is_year() ): ?>
				<h1 class="page_title">Tous les postes pour l'<?= str_replace( ': ', '', strtolower( get_the_archive_title() ) ) ?></h1>

			<?php elseif ( is_month() ): ?>
				<?php
					$title = explode(' ', get_the_archive_title());
					$month = $title[1];
					$year = $title[2];

					if ($month == 'avril' || $month == 'août' || $month == 'octobre') {
						$determinant = 'd\'';
					}
					else {
						$determinant = 'de';
					}

					$categoryDate = $determinant == 'd\'' ? $determinant . $month . ' ' . $year : $determinant . ' ' . $month . ' ' . $year;
				?>

				<h1 class="page_title">Tous les postes pour du mois <?= $categoryDate ?></h1>

			<?php elseif ( is_day() ): ?>
				<h1 class="page_title">Tous les postes du <?= str_replace( ': ', '', strtolower( get_the_archive_title() ) ) ?></h1>

			<?php elseif ( is_date() ): ?>
				<h1 class="page_title">Tous les postes pour le <?= strtolower( get_the_archive_title() ) ?></h1>

			<?php endif; ?>

			<h2 class="page-subtitle"><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

		<?php elseif ( is_front_page() ): ?>
			<h1 class="page_title"><?= single_post_title() ?></h1>
			<?php if (get_post_meta($post->ID, 'subtitle', true)):?>
				<h2 class="page_subtitle"><?= get_post_meta($post->ID, 'subtitle', true); ?></h2>
			<?php else: ?>
				<h2 class="page_subtitle"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>

		<?php elseif ( is_page() ): ?>
			<h1 class="page_title"><?= single_post_title() ?></h1>
			<?php if (get_post_meta($post->ID, 'subtitle', true)):?>
				<h2 class="page_subtitle"><?= get_post_meta($post->ID, 'subtitle', true); ?></h2>
			<?php else: ?>
				<h2 class="page_subtitle"><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
			<?php endif; ?>

		<?php elseif ( is_attachment() ): ?>
			<h1 class="page_title">Media <?= single_post_title() ?></h1>
			<h2 class="page_subtitle"><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

		<?php elseif ( is_single() ): ?>
			<h1 class="page_title"><?= single_post_title() ?></h1>
			<?php if (get_post_meta($post->ID, 'subtitle', true)):?>
				<h2 class="page_subtitle"><?= get_post_meta($post->ID, 'subtitle', true); ?></h2>
			<?php else: ?>
				<h2 class="page_subtitle"><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
			<?php endif; ?>

		<?php elseif ( is_404() ): ?>
			<h1 class="page_title" style="display: inline;">404 Not Found</h1> <span style="font-size: 2.5em;">😱</span>
			<h2>Aucune page n'a été trouvée à cette adresse...</h2>

		<?php elseif ( is_search() ): ?>
			<h1 class="page_title">Résultats pour la recherche : "<?= get_search_query(); ?>"</h1>
			<h2><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

		<?php elseif ( is_home() ): ?>
			<h1 class="page_title"><?= single_post_title() ?></h1>
			<?php if (get_post_meta($post->ID, 'subtitle', true)):?>
				<h2 class="page_subtitle"><?= get_post_meta($post->ID, 'subtitle', true); ?></h2>
			<?php else: ?>
				<h2 class="page_subtitle"><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
			<?php endif; ?>

		<?php else : ?>
			<h1 class="page_title"><?= single_post_title() ?></h1>
			<h2 class="page_title"><a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
		<?php endif; ?>


		<nav id="site-navigation" class="navbar">

			<?php if (has_nav_menu('navbar-menu')):		
				$wrap  = '<ul id="%1$s" class="%2$s">';		// Open <ul> menu

				if (get_theme_mod( 'custom_logo' ))
				{
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$custom_logo_url = wp_get_attachment_image_src( $custom_logo_id , 'medium' )[0];
					$custom_logo_meta = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', TRUE);

					$link_id = 'id="primary-menu__custom_logo"';
					$img_tag .= '<img src="' . $custom_logo_url . '" alt="' . $custom_logo_meta . '"> </a></li>';	// Add image to home item, if there is custom logo set
				}

				$wrap .= '<li><a ' . $link_id . ' href="' . esc_url( home_url( '/' ) ) . '" rel="home">Accueil</a>' . $img_tag . '</li>';	// Close home item
				
				$wrap .= '%3$s';	// Add WordPress items (configured in /wp-admin/)
				$wrap .= '</ul>';	// Close the <ul> menu

				// Generate the menu
				wp_nav_menu( array(
					'theme_location'	=>	'navbar-menu',
					'menu_id'			=>	'primary-menu',
					'container'			=>	false,
					'items_wrap'		=>	$wrap
				));
			endif; ?>

			<?= get_search_form() ?>

			<label id="site-navigation__burger_menu__icon" for="site-navigation__burger_menu__checkbox">
				<span style="background-color: black"></span>
				<span style="background-color: black"></span>
				<span style="background-color: black"></span>
			</label>
			<input type="checkbox" name="site-navigation__burger_menu__checkbox" id="site-navigation__burger_menu__checkbox"/>
		</nav>

		<?php
			// if there is no thumbnail for this post, get header image id
			$header_img_id = (get_post_thumbnail_id() == "") ? attachment_url_to_postid(get_theme_mod('header_image')) : get_post_thumbnail_id();

			// If the ID is 0 it is possible that it's because the header image is random.
			// Donc SI l'ID est 0 alors on récupère une image d'entête aléatoire SINON 
			$header_img_url = ($header_img_id == 0) ? get_random_header_image() : wp_get_attachment_image_src( $header_img_id , 'medium' )[0];

			$header_img_meta = get_post_meta($header_img_id, '_wp_attachment_image_alt', TRUE);

			if ($header_img_url != ""):
		?>			
		<div id="masthead__hero_container">
				<img src="<?= $header_img_url ?>" alt="<?= $header_img_meta ?>">
			</div>
		<?php endif; ?>


<?php if ($is_localhost) : ?>
	<!-- header template : header.php - END -->
<?php if (is_localhost()): ?>
	<!-- Header Template : header.php - END -->
<?php endif; ?>
