<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MyWPStarterTheme
 * @package mywpstartertheme
 */

get_header();
?>

<main id="content" class="site-main">
    <div class="entry-attachment">
        <?php
            $image_size = apply_filters( 'wporg_attachment_size', 'large' ); 
            echo wp_get_attachment_image( get_the_ID(), $image_size );
        ?>
    
        <?php if ( has_excerpt() ) : ?>
            <div class="entry-caption">
                    <?php the_excerpt(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
