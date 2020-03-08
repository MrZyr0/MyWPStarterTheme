<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package mywpstartertheme
 */


if (is_localhost()) :
	echo '<!-- Page Template : page.php - START -->';
endif;

get_header();

if (is_localhost()) :
	echo '<!-- Page Template : page.php - CONTENT-start -->';
endif;
?>

</header>

	<main id="site-content" class="content-area" role="main">

		<?php
		if( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				get_template_part( 'inc/template-parts/content', 'page');

			endwhile;
		else:
			get_template_part( 'inc/template-parts/content', 'none' );
		endif;
		?>

	</main><!-- #content -->

<?php
get_footer();

if ($is_localhost) :
	echo '<!-- Page Template : page.php - END -->';
endif;
