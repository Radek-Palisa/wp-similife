<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Similife
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'similife' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>

			<a class="site-branding__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="http://localhost/wp-similife/wp-content/uploads/2017/03/logo-cut-small-logo.png" alt="SimiLife">
				<img src="http://localhost/wp-similife/wp-content/uploads/2017/03/logo-cut-small-desc.png" alt="Lifestyle blog">
			</a>
		</div><!-- .site-branding -->
		<div class="header-site-navigation title-lines" id="headerSiteNavigation">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'similife' ); ?></button> -->
			<button class="menu-button menu-button--sm" id="menuButton">
				<b>Menu</b>
				<span></span>
				<span></span>
				<span></span>
			</button>

		</div><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
