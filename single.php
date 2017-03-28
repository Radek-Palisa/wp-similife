<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Similife
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main site-main--single" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() ); ?>

			<nav class="post-navigation-outer">
<!-- 				<div class="navigation-labels">
					<span>Další příspěvek</span>
					<span>Předchozí příspěvek</span>
				</div> -->
				<?php the_post_navigation(); ?>
			</nav>
			
			<!-- // If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif; -->

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer();
