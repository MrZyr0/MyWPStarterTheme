<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package MyWPStarterTheme
 * @package mywpstartertheme
 */

if ($is_localhost) :
	echo '<!-- page template : page.php - START -->';

if (is_localhost()) :
	echo '<!-- Page Template : page.php - START -->';
endif;

get_header();

if ($is_localhost) :
	echo '<!-- page template : page.php - CONTENT -->';
if (is_localhost()) :
	echo '<!-- Page Template : page.php - CONTENT-start -->';
endif;
?>

</header>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile;
		else:
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

if ($is_localhost) :
	echo '<!-- page template : page.php - END -->';
	echo '<!-- Page Template : page.php - END -->';
endif;
