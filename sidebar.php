<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Similife
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area menu-slide" role="complementary">

	<button class="menu-slide__closeBtn menu-button--activated" id="menu-button-close">

		<span>
			<strong class="menu-slide__closeBtn__label">Zavřít</strong>
			<span></span>
			<span></span>
			<span></span>
		</span>
	</button>
	<div class="right-sidebar" id="menuSlideSidebar">
		<div class="right-sidebar-inner right-sidebar-inner--js">
			<nav id="site-navigation" role="navigation" class="main-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>	
</aside><!-- #secondary -->
