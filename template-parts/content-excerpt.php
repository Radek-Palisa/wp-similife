<?php
/**
 * Template part for displaying post excerpts on index page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Similife
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('excerpt'); ?>>

	<a class="excerpt__thumb" href="<?php the_permalink(); ?>" rel="bookmark">
		<?php the_post_thumbnail(); ?>
		<div class="excerpt__thumb__overlay">
			<span>Zobrazit příspěvek</span>
		</div>
	</a>

	<div class="excerpt__body">
		<?php the_title( '<h2 class="excerpt-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
			<div class="excerpt-meta">
				<?php similife_posted_on(); ?>
			</div>
		<?php endif; ?>
		<p class="excerpt-text">
			<?php echo get_the_excerpt(); ?>
		</p>
	</div>

	<footer class="excerpt__footer">
		<?php similife_entry_tags(); ?>
		<a class="excerpt-goToPostBtn" href="<?php the_permalink(); ?>">Zobrazit příspěvek</a>
	</footer>
</article>