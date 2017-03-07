<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Similife
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

	</header><!-- .entry-header -->

	<div class="entry-content">
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php the_post_thumbnail(); ?>
		</a>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php similife_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

		<?php echo get_the_excerpt(); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php similife_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->