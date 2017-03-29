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
<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,700&amp;subset=latin-ext" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 10]>
<div class="browser-notify">
<img src="<?php bloginfo('template_directory'); ?>/images/logo-bolder-white.svg">
<p class="browser-notify__message">Tyto webové stránky jsou optimalizované pro moderní prohlížeče a nepodporují vaší verzi Internet Exploreru.</p>
</div>
<![endif]-->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'similife' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">


			<?php
			/*
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif; */

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>

			<a class="site-branding__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php bloginfo('template_directory'); ?>/images/logo-bolder.svg" alt="SimiLife">
				<img src="<?php bloginfo('template_directory'); ?>/images/desc-bolder.svg" alt="Lifestyle blog">
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
