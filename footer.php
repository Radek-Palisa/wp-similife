<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Similife
 */

?>

	</div><!-- #content -->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">

	<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
		<div id="footer-widgets" class="footer-widgets widget-area" role="complementary">
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
		</div><!-- #primary-sidebar -->
	<?php endif; ?>

	<div class="site-info">
		<small>&#169; Simlife <?php echo date("Y"); ?></small>
	</div><!-- .site-info -->
</footer><!-- #colophon -->


<script src="/wp-similife/wp-content/themes/similife/js/jquery-3.1.1.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>
