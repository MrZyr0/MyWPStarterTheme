<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mywpstartertheme
 */

get_header();
?>

<!-- Default blog home template : home.php - START -->

	<?php get_template_part( 'archive' ); ?>

<!-- Default blog home template : home.php - END -->

<?php
get_sidebar();
get_footer();
