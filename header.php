<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

?><!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php tha_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php tha_head_bottom(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php tha_body_top(); ?>
<div class="site-container">
	<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'ea' ); ?></a>

	<?php tha_header_before(); ?>
	<header class="site-header" role="banner">
		<?php ea_structural_wrap( 'header' ); ?>
		<?php tha_header_top(); ?>
		<div class="site-branding">
			<?php
			if ( apply_filters( 'ea_h1_site_title', false ) || ( is_front_page() && is_home() ) ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; ?></p>
			<?php
			endif; ?>
		</div>

		<?php 
		if( has_nav_menu( 'primary' ) ) {
			echo '<nav class="nav-primary nav-menu" role="navigation">';
			wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
			echo '</nav>';
			echo '<a class="mobile-menu-toggle" href="#"><i class="icon-menu"></i><i class="icon-close"></i></a>';
		}
		?>
		
	<?php tha_header_bottom(); ?>
	<?php ea_structural_wrap( 'header', 'close' ); ?>
	</header>
	<?php tha_header_after(); ?>

	<div class="site-inner" id="main-content">
	<?php ea_structural_wrap( 'site-inner' ); ?>