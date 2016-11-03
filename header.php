<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

echo '<!DOCTYPE html>';
tha_html_before();
echo '<html ' . get_language_attributes() . '>';

echo '<head>';
	tha_head_top();
	wp_head();
	tha_head_bottom();
echo '</head>';

echo '<body class="' . join( ' ', get_body_class() ) . '">';
tha_body_top();
echo '<div class="site-container">';
	echo '<a class="skip-link screen-reader-text" href="#main-content">' . esc_html__( 'Skip to content', 'ea' ) . '</a>';

	tha_header_before();
	echo '<header class="site-header" role="banner">';
		ea_structural_wrap( 'header' );
		tha_header_top();

		echo '<div class="site-branding">';
		$logo_tag = ( apply_filters( 'ea_h1_site_title', false ) || ( is_front_page() && is_home() ) ) ? 'h1' : 'p';
		echo '<' . $logo_tag . ' class="site-title"><a href="' . esc_url( home_url() ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
		echo '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>';
		echo '</div>';

		tha_header_bottom();
		ea_structural_wrap( 'header', 'close' );
	echo '</header>';
	tha_header_after();

	echo '<div class="site-inner" id="main-content">';
	ea_structural_wrap( 'site-inner' );
