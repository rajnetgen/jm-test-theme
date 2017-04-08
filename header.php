<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jm-theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<style type="text/css">
	body {
  color:<?php echo get_option( 'jm_color_schemep' );?>;
}
 h2 {
 	color:<?php echo get_option( 'jm_color_schemeh2' );?>;
 	}
 	a {
 	color:<?php echo get_option( 'jm_color_schemeha' );?>;
 	}

</style>
<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jm-theme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	<?php if ( function_exists( 'get_option' ) ) { 
				$var2 = get_option('jm_colur_scheme');?>
				<?php echo $var2; ?> </a>
	<?php		} ?>
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php if ( function_exists( 'get_option' ) ) { 
				$var = get_option('jm_logo');?>
				<a href="<?php echo get_option('home'); ?>/"><img alt="Ekant" title="Ekant" src="<?php echo $var; ?>" /></a>
	<?php		} ?>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'jm-theme' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
