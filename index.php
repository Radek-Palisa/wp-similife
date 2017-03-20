<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Similife
 */

get_header(); ?>

	<section class="featured">
		<?php $my_query = new WP_Query( 'category_name=Featured&posts_per_page=4' );
		$featuredCount = 0;
		while ( $my_query->have_posts() ) : $my_query->the_post(); 
		$featuredCount++; ?>
			
			<article class="featured__item featured__item--<?php echo $featuredCount ?>" id="post-<?php the_ID(); ?>">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="featured-thumb" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>		
					<?php else : ?>
						<div>Thumbnail není k dispozici</div>
					<?php endif; ?>
					<h2><?php the_title(); ?></h2>
				</a>
			</article>

		<?php endwhile; ?>
	</section>

	<section class="social-following">
		<strong class="title-lines">i, i follow, follow you, deep sea baby</strong>
	</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="secondary-menu">
				<strong class="secondary-menu__title">Rubriky</strong>
				<?php wp_nav_menu( array( 'theme_location' => 'secondary-menu' ) ); ?>
			</section>

			<div class="excerpts-outer">

				<header class="excerpts-header">
					<strong>Nejnovější příspěvky</strong>
				</header>

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

					<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'excerpt' );
						//get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					numeric_posts_nav();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>

			<?php get_sidebar(); ?>
		</main><!-- #main -->

		<?php if ( is_active_sidebar( 'partners-aside' ) ) : ?>
			<section class="partners-aside">
				<h3>Partneři</h3>
				<ul class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'partners-aside' ); ?>
				</ul>
			</section>
		<?php endif; ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
