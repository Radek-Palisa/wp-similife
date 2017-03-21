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

	<div class="single-thumb">
		<?php the_post_thumbnail(); ?>
	</div>

	<header class="single-header">

		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="single-meta">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Similife</a></li>
				<li> > Blog > </li>
				<li><?php echo the_title() ?></li>
			</ol>
			<?php similife_posted_on(); ?>	
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

		<?php similife_entry_tags(); ?>

		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>

	</header><!-- .entry-header -->

	<div class="single-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'similife' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'similife' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php similife_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
