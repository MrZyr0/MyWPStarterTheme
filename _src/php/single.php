<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mywpstartertheme
 */

get_header();
?>

<main id="content" class="site-main">
	<article id="post" class="<?= 'post-' . the_ID() . ' ' . post_class()?>">
		<?php while ( have_posts() ) : ?>

		<header class="post__header">
			<?php
				the_title();
				
				$article_image_url = get_the_post_thumbnail_url();
				$article_image_id = isset($article_image_url) ? attachment_url_to_postid($article_image_url) : false;
				$article_image_alt = isset($article_image_url) ? get_post_meta($article_image_id, '_wp_attachment_image_alt', true) : false;
			?>

			<?php if ($article_image_url): ?>
				<img src="<?= $article_image_url ?>" alt="<?= $article_image_alt ?>">
			<?php endif; ?>

			<?php
				// TODO: Make tags clickable to catch other items with the same tag
				$tags = get_the_tags();
				if ($tags != false) :
			?>
			<div class="post__header__tags">
				<?php
					// TODO: Add a control in customizer
					$nbOfTagsDisplayed = 0;
					foreach ($tags as $tag):
					if ($nbOfTagsDisplayed == 5) { break; }
				?>
				
						<p class="post_tags__tag">#<?= $tag->name; ?></p>
				<?php
					$nbOfTagsDisplayed++;
					endforeach;
				?>
			</div>
			<?php endif; ?>

			<div class="post__header__meta">
				<p class="post__header__meta__author"><?php the_author(); ?></p> <?php //TODO: add check if user wants to ?>

				<span>-</span>

				<?php if (get_the_modified_date() != get_the_date()) :?>
					<p class="post__header__meta__published_on post_updated"><?php the_date(); ?></p>
					<p class="post__header__meta__update_on">update on : <?php the_modified_date(); ?></p>
				<?php else: ?>
					<p class="post__header__meta__published_on"><?php the_date(); ?></p>
				<?php endif; ?>
			</div>
		</header>

		<section id="post-content">
			<?php the_post(); ?>
		</section>

		<section id="post-naviguation">
			<?php the_post_navigation(); ?>
		</section>

		<section id="post-comments">
			<?php
				// wp_list_comments();
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		</section>

		<?php endwhile; ?>
	</article>

	<?php if (get_sidebar()): ?>
		<aside>
			<?php //get_sidebar(); ?>
		</aside>
	<?php endif; ?>
</main>

<?php
get_footer();
