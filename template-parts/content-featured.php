<?php
/**
 * Template part for displaying featured posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Similife
 */

?>

	<article class="featured__item" id="post-<?php the_ID(); ?>">

		<div class="entry-content">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
			</a>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

			<?php echo $featuredCount ?>
			<?php echo $wp_query->current_post ?>
		</div>

	</article>
